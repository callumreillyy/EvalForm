<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Response Visualizations</h2>
    <!-- Add your response visualizations here -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold mb-2">Visualization Title 1</h3>
        <p class="text-gray-600 py-2">Description of Survey 1</p>
        <div class="h-40 bg-gray-400"></div>
      </div>
      <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold mb-2">Visualization Title 2</h3>
        <p class="text-gray-600 py-2">Description of Survey 1</p>
        <div class="h-40 bg-gray-400"></div>
      </div>
      <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold mb-2">Visualization Title 3</h3>
        <p class="text-gray-600 py-2">Description of Survey 1</p>
        <div class="h-40 bg-gray-400"></div>
      </div>
      <!-- Add more visualizations as needed -->
    </div>
  </div>

<?= $this->endSection() ?>
