<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NazioniTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NazioniTable Test Case
 */
class NazioniTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NazioniTable
     */
    protected $Nazioni;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Nazioni',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Nazioni') ? [] : ['className' => NazioniTable::class];
        $this->Nazioni = $this->getTableLocator()->get('Nazioni', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Nazioni);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NazioniTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
