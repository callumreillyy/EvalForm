<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl text-white font-bold mb-4">My Surveys</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      <!-- Featured Survey 1 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 1</h3>
        <p class="text-gray-600">Description of Survey 1</p>
      </div>
      <!-- Featured Survey 2 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 2</h3>
        <p class="text-gray-600">Description of Survey 2</p>
      </div>
      <!-- Featured Survey 3 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 3</h3>
        <p class="text-gray-600">Description of Survey 3</p>
      </div>
      <!-- Featured Survey 4 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 4</h3>
        <p class="text-gray-600">Description of Survey 4</p>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl text-white font-bold mb-4">View Feedback</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      <!-- Featured Survey 1 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 1</h3>
        <p class="text-gray-600">Survey Responses: 1234</p>
      </div>
      <!-- Featured Survey 2 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 2</h3>
        <p class="text-gray-600">Survey Responses: 1234</p>
      </div>
      <!-- Featured Survey 3 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 3</h3>
        <p class="text-gray-600">Survey Responses: 1234</p>
      </div>
      <!-- Featured Survey 4 -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <div class="h-40 bg-gray-400 mb-4"></div>
        <h3 class="text-lg font-bold mb-2">Survey Title 4</h3>
        <p class="text-gray-600">Survey Responses: 1234</p>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>
