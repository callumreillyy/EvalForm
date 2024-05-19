<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8 min-h-screen">
    <!-- Survey Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
      <h2 class="text-2xl font-bold mb-4"><?= $survey['title'] ?></h2>
      <p class="text-gray-600 mb-4"><?= $survey['description'] ?></p>
      <p class="text-gray-600">Created By: <?= $user[0]['name'] ?> </p>
    </div>

    <!-- Questions -->
    <div class="bg-white rounded-lg shadow-md p-6" id="textQuestionBody">      
      <!-- Free Text Entry -->
      <?php foreach ($textQuestions as $textQuestion): ?>
        <div class="mb-6 text-question-item" id="text-question-id-<?= esc($textQuestion['text_question_id']) ?>">
          <h3 class="number text-lg font-bold mb-2"><?= esc($textQuestion['number']) ?></h3> 
          <h3 class="question text-lg mb-2"><?= esc($textQuestion['question']) ?></h3>
          <textarea class="response w-full px-4 py-2 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
          <input type="hidden" class="textQuestion-id" value="<?= esc($textQuestion['text_question_id']) ?>">
          <input type="hidden" class="survey-id" value="<?= esc($textQuestion['survey_id']) ?>">
          <div class="py-2">
            <button type="button" class="btn btn-primary btn-sm edit-textQuestion" data-bs-toggle="modal" data-bs-target="#textQuestionModal">Edit</button>
            <button type="button" class="btn btn-danger btn-sm delete-textQuestion">Delete</button>
          </div>
        </div>
      <?php endforeach; ?>   
    </div>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#textQuestionModal" id="addTextQuestionBtn">Add Text Question</button>

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
              <h5 class="modal-title" id="textQuestionModalLabel"></h5>
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
                  <input type="hidden" id="response" name="response">
                  <input type="hidden" id="textQuestionId" name="text_question_id">
                  <input type="hidden" id="surveyId" name="survey_id" value="<?= esc($survey['survey_id']) ?>">
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="saveTextQuestion">Save</button>
          </div>
        </div>
      </div> 

    <!-- Template for new textQuestion -->
    <template id="textQuestionTemplate">
      <div class="mb-6 text-question-item">
        <h3 class="number text-lg font-bold mb-2">tester template</h3> 
        <h3 class="question text-lg mb-2">tester template</h3>
        <textarea class="response w-full px-4 py-2 rounded-lg bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" ></textarea>
        <input type="hidden" class="textQuestion-id" value="">
        <input type="hidden" class="survey-id" value="">
        <div class="py-2">
          <button type="button" class="btn btn-primary btn-sm edit-textQuestion" data-bs-toggle="modal" data-bs-target="#textQuestionModal">Edit</button>
          <button type="button" class="btn btn-danger btn-sm delete-textQuestion">Delete</button>
        </div>
      </div>
    </template>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>

    const base_url = 'https://infs3202-eeb1c0a8.uqcloud.net/EvalForm/textQuestion';

    // Function to show alert messages
    function showAlert(message, type) {
        const alertBox = document.getElementById('questionAlert');
        const alertMessage = document.getElementById('questionAlertMessage');
        alertMessage.textContent = message;
        alertBox.className = `alert alert-${type} alert-dismissible fade show`;
        alertBox.style.display = 'block';

        // Only display for 5 seconds
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 5000);
    }

    // Add Text Question Modal setup
    document.getElementById('addTextQuestionBtn').addEventListener('click', () => {
        document.getElementById('textQuestionModalLabel').textContent = 'Add Text Question';
        document.getElementById('textQuestionForm').reset();  // Clear the form for new entry
              document.getElementById('textQuestionId').value = '';  // Clear the hidden education ID
          });

    // Edit Education Button Click
    document.addEventListener('click', function(event) {
      if (event.target.classList.contains('edit-textQuestion')) {
        const textQuestionItem = event.target.closest('.text-question-item');
        
        const textQuestionId = textQuestionItem.querySelector('.textQuestion-id').value;
        const surveyId = textQuestionItem.querySelector('.survey-id').value;
        const number = textQuestionItem.querySelector('.number').textContent;
        const question = textQuestionItem.querySelector('.question').textContent;
        const response = textQuestionItem.querySelector('.response').value;

        console.log(textQuestionId);

        document.getElementById('textQuestionModalLabel').textContent = 'Edit Text Question';
        document.getElementById('number').value = number;
        document.getElementById('question').value = question;
        document.getElementById('response').value = response;
        document.getElementById('textQuestionId').value = textQuestionId;
        document.getElementById('surveyId').value = surveyId;
      }
    });

    // Save button in modal for both adding and editing
    document.getElementById('saveTextQuestion').addEventListener('click', () => {
        const form = document.getElementById('textQuestionForm');
        const formData = new FormData(form);
        const textQuestionId = formData.get('text_question_id');
        const data = Object.fromEntries(formData.entries());

        const url = textQuestionId ? `${base_url}/${textQuestionId}` : `${base_url}`;

        if (textQuestionId) {
          fetch(url, {
              method: 'PUT',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(data => {
            if (data) {
              const textQuestionItem = document.getElementById(`text-question-id-${textQuestionId}`);
              textQuestionItem.querySelector('.number').textContent = formData.get('number');
              textQuestionItem.querySelector('.question').textContent = formData.get('question');
              bootstrap.Modal.getInstance(document.getElementById('textQuestionModal')).hide();
              showAlert('Text Question updated successfully.', 'success');
            } else {
                throw new Error('Failed to save the text question');
            }
        })
          .catch(error => {
              showAlert(error.message, 'danger');
          });
        } else {
          console.log("were here as the id hasnt been set sad");
        // Add new text question
          fetch(url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(data => {
            if (data) {
              console.log(data);
              const template = document.getElementById('textQuestionTemplate');
              const clone = template.content.cloneNode(true);

              clone.querySelector('.textQuestion-id').value = data.text_question_id;
              clone.querySelector('.survey-id').value = formData.get('surveyId');
              clone.querySelector('.number').textContent = formData.get('number');
              clone.querySelector('.question').textContent = formData.get('question');
              clone.querySelector('.response').textContent = formData.get('response');
              bootstrap.Modal.getInstance(document.getElementById('textQuestionModal')).hide();
              document.getElementById('textQuestionBody').appendChild(clone);
              form.reset();
              showAlert('Text Question added successfully. Refresh page to edit', 'success');
            } else {
              showAlert('Error adding education. Please try again.', 'danger');
            }
          })
          .catch(error => {
          console.error('Error:', error);
          showAlert('Error adding text question. Please try again.', 'danger');
        });
      }
    });

    // Handling delete operation with confirmation
    document.addEventListener('click', event => {
        if (event.target.classList.contains('delete-textQuestion')) {
            if (confirm('Are you sure you want to delete this text question?')) {
              const textQuestionItem = event.target.closest('.text-question-item');
              const textQuestionId = textQuestionItem.querySelector('.textQuestion-id').value;

                console.log(textQuestionId); // Check the textQuestionId value

                fetch(`${base_url}/${textQuestionId}`, {
                    method: 'DELETE'
                })
                .then(response => {
                    if (response.ok) {
                        showAlert('Text Question deleted successfully!', 'success');
                        textQuestionItem.remove(); // Remove the text question item from the DOM
                    } else {
                        throw new Error('Failed to delete the text question');
                    }
                })
                .catch(error => {
                    showAlert(error.message, 'danger');
                });
            }
        }
    });


</script>

<?= $this->endSection() ?>
