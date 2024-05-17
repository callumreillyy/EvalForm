<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8 h-screen">
    <h2 class="text-2xl font-bold mb-4">My Surveys</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach ($surveys as $survey): ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="h-40 bg-gray-400 mb-4"></div>
                <h3 class="text-lg font-bold mb-2"><?= $survey['title'] ?></h3>
                <p class="text-gray-600"><?= $survey['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-8 flex justify-center">
        <?= str_replace('<a ', '<a class="px-3 py-1 bg-white text-blue-500 rounded-full mr-3"', $pager->links()) ?>
    </div>
  

</div>



<?= $this->endSection() ?>


