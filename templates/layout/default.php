<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    CRM
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>

  <?= ''; //$this->AssetMix->css('main') ?>

  <?= $this->AssetMix->script('app') ?>
</head>

<body>
  <div id="app" class="d-flex flex-column min-vh-100">

    <div v-cloak class="flex-grow-1">

      <div class="v-cloak--inline">
        <!-- Parts that will be visible before compiled your HTML -->
        <div class="spinner"></div>
      </div>

      <div class="v-cloak--hidden">
        <!-- Parts that will be visible After compiled your HTML -->
        <top-header></top-header>

        <main role="main" class="container">
          <app></app>
        </main><!-- /.container -->
      </div>
    </div>

    <footer class="footer bg-dark text-white my-auto">
      <div class="container p-2">
        BikeSquare CRM <small>&copy; 2021 BikeSquare srl</small>
      </div>
    </footer>
  </div>
</body>

</html>