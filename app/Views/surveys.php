<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8 min-h-screen">
    <h2 class="text-2xl text-white font-bold mb-4">My Surveys</h2>
    <div class="py-4">
        <form class="flex-grow" method="get" action="<?= base_url('surveys/'.$user_id); ?>">
            <div class="flex">
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Enter your search..." name="search">
                <button class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach ($surveys as $survey): ?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="h-40 bg-gray-400 mb-4"></div>
                <h3 class="text-lg font-bold mb-2"><?= $survey['title'] ?></h3>
                <p class="text-gray-600"><?= $survey['description'] ?></p>
                <a class="text-blue-500 hover:text-blue-600 edit" href="<?= base_url('surveys/addeditSurvey/'.$survey['survey_id']);?>">add/edit</a>
                <a class="text-blue-500 hover:text-blue-600" href="<?= base_url('surveys/deleteSurvey/' . $survey['survey_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this survey?')">delete</a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-8 flex justify-center">
        <?= str_replace('<a ', '<a class="px-3 py-1 bg-white text-blue-500 rounded-full mr-3"', $pager->links()) ?>
    </div>
</div>

<?= $this->endSection() ?>


