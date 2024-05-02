<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8 flex flex-col justify-center items-center h-full">
      <div class="flex flex-col justify-center items-center md:flex-row">
          <div class="px-4 text-center md:text-left">
              <h1 class="text-white text-9xl font-bold">EvalForm</h1>
              <h2 class="text-white text-4xl font-bold">Streamlined Survey Distribution</h2>
          </div>
          <img src="home-image.png" alt="Placeholder Image" class="px-4 py-10 w-1/2 lg:h-screen lg:w-full">
      </div>
    </div>

    <div class="bg-gray-100 mx-auto px-4 py-8 flex justify-center items-center h-screen">
      <div class="px-4">
          <h1 class="text-blue-800 text-9xl font-bold">Start collecting feedback now!</h1>
          <button class="bg-blue-100 text-blue-800 font-bold text-2xl py-4 px-6 rounded mt-8">Create Your First Survey</button>
      </div>
    </div>

<?= $this->endSection() ?>
