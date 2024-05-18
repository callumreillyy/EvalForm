<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-- Survey Title and Description input. Creates a Surveys table entry -->
<section class="py-5">
    <div class="container h-screen mx-auto">
        <div class="flex justify-center">
            <div class="w-full lg:w-1/2">
                <h2 class="text-center text-white font-bold text-2xl"><?= isset($survey) ? 'Edit Survey' : 'Add Survey' ?></h2>
                <form method="post" action="<?= base_url('surveys/addeditSurvey' . (isset($survey) ? '/' . $survey['survey_id'] : '')) ?>" class="mb-3">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-white">Title</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="name" name="name" value="<?= isset($survey) ? esc($survey['title']) : '' ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-white">Destiption</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="email" name="email" value="<?= isset($survey) ? esc($survey['description']) : '' ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-white">Respondants</label>
                        <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" id="phone" name="phone" value="<?= isset($survey) ? esc($survey['respondants']) : '' ?>">
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"><?= isset($survey) ? 'Update Survey' : 'Add Survey' ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
