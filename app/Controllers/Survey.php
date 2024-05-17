<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\SurveyModel;

class Survey extends ResourceController
{
    use ResponseTrait;

    /**
     * Handle GET requests to list survey entries or filter by user_id.
     */
    public function index()
    {
        $model = new SurveyModel();

        // Retrieve 'user_id' from query parameters if provided.
        $userId = $this->request->getGet('user_id');

        // Filter the data by user_id if provided, otherwise retrieve all entries.
        $data = $userId ? $model->where('user_id', $userId)->findAll() : $model->findAll();

        // Use HTTP 200 to return data.
        return $this->respond($data);
    }

    /**
     * Handle GET requests to retrieve a single survey entry by its ID.
     */
    public function show($id = null)
    {
        $model = new SurveyModel();

        // Attempt to retrieve the specific survey entry by ID.
        $data = $model->find($id);

        // Check if data was found.
        if ($data) {
            return $this->respond($data);
        } else {
            // Return a 404 error if no data is found.
            return $this->failNotFound("No Survey entry found with ID: {$id}");
        }
    }

    /**
     * Handle POST requests to create a new survey entry.
     */
    public function create()
    {
        $model = new SurveyModel();
        $data = $this->request->getJSON(true);  // Ensure the received data is an array.

        // Validate input data before insertion.
        if (empty($data)) {
            return $this->failValidationErrors('No data provided.');
        }

        // Insert data and check for success.
        $inserted = $model->insert($data);
        if ($inserted) {
            return $this->respondCreated($data, 'Survey data created successfully.');
        } else {
            return $this->failServerError('Failed to create survey data.');
        }
    }

    /**
     * Handle PUT requests to update an existing survey entry by its ID.
     */
    public function update($id = null)
    {
        $model = new SurveyModel();
        $data = $this->request->getJSON(true);  // Ensure the received data is an array.

        // Check if the record exists before attempting update.
        if (!$model->find($id)) {
            return $this->failNotFound("No Survey entry found with ID: {$id}");
        }

        // Update the record and handle the response.
        if ($model->update($id, $data)) {
            return $this->respondUpdated($data, 'Survey data updated successfully.');
        } else {
            return $this->failServerError('Failed to update survey data.');
        }
    }

    /**
     * Handle DELETE requests to remove an existing survey entry by its ID.
     */
    public function delete($id = null)
    {
        $model = new Survey();

        // Check if the record exists before attempting deletion.
        if (!$model->find($id)) {
            return $this->failNotFound("No Survey entry found with ID: {$id}");
        }

        // Attempt to delete the record.
        if ($model->delete($id)) {
            return $this->respondDeleted(['id' => $id, 'message' => 'Survey data deleted successfully.']);
        } else {
            return $this->failServerError('Failed to delete survey data.');
        }
    }
}