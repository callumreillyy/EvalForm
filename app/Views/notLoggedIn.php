<!-- app/Views/access_denied.php -->
<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="min-h-screen py-5 flex flex-col items-center bg-gray-100">
    <div class="w-full max-w-lg p-4 bg-red-600 text-white rounded-t-lg">
        <h1 class="text-3xl font-bold">Oops. Not Logged In</h1>
    </div>
    <div class="w-full max-w-lg p-6 bg-white rounded-b-lg shadow-md text-center">
        <p class="text-lg text-gray-700 mb-6">You must be logged in to view this page.</p>
        <a href="<?= base_url('/login'); ?>" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition-colors duration-300 text-decoration-none">to Login</a>
    </div>
</div>

<?= $this->endSection() ?>