<?php

declare(strict_types=1);

namespace App\Command;

use App\Model\Entity\User;
use App\Notification\timetableDigestNotification;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Configure;
use Cake\ORM\Query;
use Exception;

class TimetableDigestNotificationsCommand extends Command
{
  protected function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
  {
    $parser
      ->addOption('test', [
        'help' => 'non manda davvero tutte le mail ma solo all\'utente di test',
      ])
      ->addOption('no-reset', [
        'help' => 'non togliere il flag notify',
      ]);

    return $parser;
  }

  public function execute(Arguments $args, ConsoleIo $io)
  {
    $this->loadModel('Timetables');
    $test = $args->getOption('test');
    $no_reset = $args->getOption('no-reset');

    //Timetables to be notified
    $timetables = $this->Timetables->find()
      ->where(['notify' => true])
      ->contain(['Offices' => ['Companies']])
      ->order(['Offices.province', 'Offices.city']);

    if ($timetables->count() == 0) {
      $io->out("Nessuna notivà per cui mandare notifiche");
      return;
    }

    if (!$test) {
      $this->loadModel('Users');
      $users = $this->Users->find()
        ->where([
          'Users.email IS NOT' => null,
          'company_id IS' => null,
          'role' => 'superiori'
        ]);
    } else {
      $u = new User([
        'email' => array_key_first(Configure::read('MailAdmin'))
      ]);
      $users = [$u];
    }

    foreach ($users as $u) {
      //Send  notification to every user 
      $n = new timetableDigestNotification($timetables, $u);
      $n->toMail();
      //$n->toDB();
      $msg = 'Notifica digest inviata con successo';
      $io->out("{$u->email} $msg");
    }

    if ($no_reset) {
      return;
    }

    //Annullo il flag di notifica
    $ids = [];
    foreach ($timetables as $t) {
      $ids[] = $t->id;
    }

    $this->Timetables->updateAll(
      ['notify' => false],
      ['id IN' => $ids]
    );
    $io->out("Tolto il flag di notifica agli orari inviati");
  }
}
