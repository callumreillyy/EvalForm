<?= $this->extend('template') ?>
<?= $this->section('content') ?>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8 h-screen">
        <!-- Survey Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Survey Title</h2>
            <p class="text-gray-600 mb-4">Description of the survey goes here.</p>
            <p class="text-gray-600">Creator: John Doe</p>
        </div>
        
        <!-- Questions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Multiple Choice Question -->
            <div class="mb-6">
                <h3 class="text-lg font-bold mb-2">Multiple Choice Question</h3>
                <div class="flex flex-wrap items-center space-x-4">
                    <input type="radio" id="option1" name="question1" class="form-radio text-blue-500" value="option1">
                    <label for="option1">Option 1</label>
                    
                    <input type="radio" id="option2" name="question1" class="form-radio text-blue-500" value="option2">
                    <label for="option2">Option 2</label>
                    
                    <input type="radio" id="option3" name="question1" class="form-radio text-blue-500" value="option3">
                    <label for="option3">Option 3</label>
                </div>
            </div>
            
            <!-- Free Text Entry -->
            <div class="mb-6">
                <h3 class="text-lg font-bold mb-2">Free Text Entry</h3>
                <textarea rows="4" class="w-full px-4 py-2 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            
            <!-- Submit Button -->
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold">Submit</button>
        </div>
    </div>

<?= $this->endSection() ?>