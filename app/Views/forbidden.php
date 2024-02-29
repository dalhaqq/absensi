<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
    <h1>Forbidden</h1>
    <p>You don't have permission to access this page</p>
    <a href="<?= route_to('home') ?>">Home</a>
    <a href="<?= route_to('logout') ?>">Logout</a>
<?= $this->endSection() ?>