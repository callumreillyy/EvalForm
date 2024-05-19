<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8 h-screen">
    <!-- Survey Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
      <h2 class="text-2xl font-bold mb-4"><?= $survey['title'] ?></h2>
      <p class="text-gray-600 mb-4"><?= $survey['description'] ?></p>
      <p class="text-gray-600">Created By: <?= $user[0]['name'] ?> </p>
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
      <div class="mb-6" id="textQuestionBody">
        <h3 class="text-lg font-bold mb-2">Free Text Entry</h3>
        <textarea rows="4" class="w-full px-4 py-2 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      </div>
      
      <!-- Submit Button -->
      <button class="bg-blue-500 text-white px-4 py-2 rounded-lg font-semibold">Submit</button>
    </div>

    <!-- Alert for displaying messages -->
    <div id="questionAlert" class="alert alert-dismissible fade show mt-3" role="alert" style="display: none;">
        <span id="questionAlertMessage"></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- textQuestion Modal for Adding/Editing -->
    <div class="modal fade" id="textQuestionModal" tabindex="-1" aria-labelledby="textQuestionModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="textQuestionModalLabel">Add textQuestion</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="textQuestionForm">
                  <div class="mb-3">
                      <label for="number" class="form-label">Number</label>
                      <input type="text" class="form-control" id="number" name="number" required>
                  </div>
                  <div class="mb-3">
                      <label for="question" class="form-label">Question</label>
                      <input type="text" class="form-control" id="question" name="question" required>
                  </div>
                  <input type="hidden" id="response" name="text_question_id">
                  <input type="hidden" id="textQuestionId" name="text_question_id">
                  <input type="hidden" id="userId" name="user_id" value="<?= esc($user[0]['user_id']) ?>">
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="savetextQuestion">Save</button>
          </div>
        </div>
      </div> 

    <!-- Template for new textQuestion -->
    <template id="textQuestionTemplate">
      <tr>
        <td class="institution"></td>
        <td class="studyType"></td>
        <td class="area"></td>
        <td><span class="startDate"></span> - <span class="endDate"></span></td>
        <td>
          <input type="hidden" class="education-id" value="">
          <input type="hidden" class="user-id" value="">
          <button type="button" class="btn btn-primary btn-sm edit-education" data-bs-toggle="modal" data-bs-target="#educationModal">Edit</button>
          <button type="button" class="btn btn-danger btn-sm delete-education">Delete</button>
        </td>
      </tr>
    </template>
  </div>

<?= $this->endSection() ?>
