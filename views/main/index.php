<?php require_once constant('URL') . 'views/main/partials/header.php'; ?>

<div id="main">
    <h1 class="center">Hola, bienvenido al sitio web</h1>

    <div class="center">
        <span><?= $this->mensaje ?></span>
    </div>

</div>

<?php require constant('URL') . 'views/main/partials/footer.php' ?>