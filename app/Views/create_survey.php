<?= $this->extend('template') ?>
<?= $this->section('content') ?>

  <!-- Create Survey Section -->
<div class="row">
    <h2>Create Survey</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Institution</th>
                <th>Degree</th>
                <th>Field of Study</th>
                <th>Years</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="educationTableBody">
            <?php foreach ($educations as $education): ?>
                <tr>
                <td><?= esc($education['institution']) ?></td>
                <td><?= esc($education['studyType']) ?></td>
                <td><?= esc($education['area']) ?></td>
                <td><?= esc($education['startDate']) ?> - <?= esc($education['endDate']) ?></td>
                <td>
                    <input type="hidden" class="education-id" value="<?= esc($education['education_id']) ?>">
                    <input type="hidden" class="user-id" value="<?= esc($education['user_id']) ?>">
                    <button type="button" class="btn btn-primary btn-sm edit-education" data-bs-toggle="modal" data-bs-target="#educationModal">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm delete-education">Delete</button>
                </td>
                </tr>
            <?php endforeach; ?>        
        </tbody>
    </table>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#educationModal" id="addEducationBtn">Add Education</button>
</div>

<!-- Alert for displaying messages -->
<div id="educationAlert" class="alert alert-dismissible fade show mt-3" role="alert" style="display: none;">
    <span id="educationAlertMessage"></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<!-- Education Modal for Adding/Editing -->
<div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="educationModalLabel">Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="educationForm">
                    <div class="mb-3">
                        <label for="institution" class="form-label">Institution</label>
                        <input type="text" class="form-control" id="institution" name="institution" required>
                    </div>
                    <div class="mb-3">
                        <label for="studyType" class="form-label">Degree</label>
                        <input type="text" class="form-control" id="studyType" name="studyType" required>
                    </div>
                    <div class="mb-3">
                        <label for="area" class="form-label">Field of Study</label>
                        <input type="text" class="form-control" id="area" name="area" required>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="text" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="text" class="form-control" id="endDate" name="endDate" required>
                    </div>
                    <input type="hidden" id="educationId" name="education_id">
                    <input type="hidden" id="userId" name="user_id" value="<?= esc($user['user_id']) ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEducation">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Template for new education row -->
<template id="educationRowTemplate">
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

<?= $this->endSection() ?>
