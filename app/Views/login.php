<?= $this->extend('layouts/base') ?>

<?= $this->section('head') ?>
<style>
	body {
		background-image: url('<?php echo base_url('bg-login.jpg') ?>') !important;
		background-size: cover;
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- component -->
<div class="min-h-screen flex items-center justify-start ps-40 w-full dark:bg-black">
	<div class="bg-white dark:bg-black shadow-md rounded-lg px-8 py-6 max-w-md">
		<img src="<?php echo base_url('site-logo.png') ?>" alt="logo" class="w-60 mx-auto mb-4">
		<h1 class="text-2xl font-semibold text-center mb-4 dark:text-black">Login</h1>
		<h2 class="text-center text-black mb-4">Sistem Informasi Perizinan BNI Finance</h2>
		<form action="<?= route_to('login') ?>" method="post">
			<div class="mb-4">
				<label for="username" class="block text-sm font-medium text-black dark:text-black mb-2">Username</label>
				<input type="text" name="username" id="username" class="shadow-sm rounded-md w-full px-3 py-2 border border-black focus:outline-none focus:ring-mygreen focus:border-mygreen">
			</div>
			<div class="mb-4">
				<label for="password" class="block text-sm font-medium text-black dark:text-black mb-2">Password</label>
				<input type="password" name="password" id="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-black focus:outline-none focus:ring-mygreen focus:border-mygreen" required>
			</div>
			<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-mygreen hover:bg-mygreen focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-mygreen">Login</button>
		</form>
	</div>
</div>
<?= $this->endSection() ?>