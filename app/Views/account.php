<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8 h-screen">
        <h2 class="text-2xl text-white font-bold mb-4">My Account</h2>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold mb-4">Account Information</h3>
            <div class="flex flex-col md:flex-row md:items-center mb-4">
                <span class="text-gray-600 mr-2">Username:</span>
                <span class="font-bold">username123</span>
            </div>
            <div class="flex flex-col md:flex-row md:items-center mb-4">
                <span class="text-gray-600 mr-2">Email:</span>
                <span class="font-bold">user@example.com</span>
            </div>
            <div class="flex flex-col md:flex-row md:items-center mb-4">
              <span class="text-gray-600 mr-2">Surveys Created:</span>
              <span class="font-bold">1234</span>
            </div>
            <div class="flex flex-col md:flex-row md:items-center mb-4">
              <span class="text-gray-600 mr-2">Feedback Receivved:</span>
              <span class="font-bold">1234</span>
            </div>
        </div>
        <div class="mt-8">
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit Account Settings</a>
        </div>
        <div class="mt-8">
          <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Logout</a>
      </div>
    </div>


<?= $this->endSection() ?>
