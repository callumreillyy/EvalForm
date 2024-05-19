<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8 flex flex-col justify-center items-center h-full">
    <div class="flex flex-col justify-center items-center lg:flex-row">
      <div class="px-4 text-center md:text-left">
        <h1 class="text-white text-9xl font-bold">EvalForm</h1>
        <h2 class="text-white text-4xl font-bold">Streamlined Survey Distribution</h2>
      </div>
      <img src= "<?= base_url('images/home-image.png'); ?>" alt="Placeholder Image" class="px-4 py-10 w-1/2 xl:h-screen lx:w-full">
    </div>
  </div>

  <div class="bg-gray-100 mx-auto px-4 py-8 flex justify-center items-center h-screen">
    <div class="px-4">
      <h1 class="text-blue-800 py-6 text-9xl font-bold ">Start collecting feedback now!</h1>
      <a class="bg-blue-200 text-blue-600 font-bold text-2xl py-6 px-6 rounded mt-8 text-decoration-none <?= service('router')->getMatchedRoute()[0] == '/surveys' ? 'active' : ''; ?>" href="<?= base_url('surveys/' . $user_id); ?>">Create Your First Survey</a>
    </div>
  </div>

<?= $this->endSection() ?>

