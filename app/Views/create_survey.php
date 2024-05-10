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

    <!-- Add Question -->
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">Add Question</label>
        <select id="question_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="multiple_choice">Multiple Choice</option>
            <option value="free_text">Free Text</option>
        </select>
    </div>

    <!-- Question Input -->
    <div id="question_input" class="mb-6 hidden">
        <label for="question" class="block text-gray-700 text-sm font-bold mb-2">Question</label>
        <input type="text" id="question" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your question...">
    </div>

    <!-- Multiple Choice Options -->
    <div id="options_input" class="mb-6 hidden">
        <label for="options" class="block text-gray-700 text-sm font-bold mb-2">Multiple Choice Options</label>
        <input type="text" id="option1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" placeholder="Option 1">
        <input type="text" id="option2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" placeholder="Option 2">
        <input type="text" id="option3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" placeholder="Option 3">
        <!-- Add more options dynamically if needed -->
    </div>

    <!-- Free Text Input -->
    <div id="free_text_input" class="mb-6 hidden">
        <label for="free_text" class="block text-gray-700 text-sm font-bold mb-2">Free Text Question</label>
        <textarea id="free_text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your free text question..." rows="3"></textarea>
    </div>

    <!-- Add Question Button -->
    <div class="flex justify-between content-center">
      <button id="add_question_btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Question</button>
      <button id="add_question_btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Generate QR</button>
    </div>
  </div>

<?= $this->endSection() ?>