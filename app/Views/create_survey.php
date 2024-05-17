<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <!-- Survey Builder Container -->
  <div class="container mx-auto px-4 py-8 h-screen">
    <h2 class="text-2xl font-bold mb-4">Build Your Survey</h2>

    <!-- Title and Description -->
    <div class="mb-6">
      <label for="survey_title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
      <input type="text" id="survey_title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter survey title...">
    </div>
    <div class="mb-6">
      <label for="survey_description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
      <textarea id="survey_description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter survey description..." rows="3"></textarea>
    </div>
  </div>

<?= $this->endSection() ?>
