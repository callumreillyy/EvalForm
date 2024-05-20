<?php 

namespace App\Controllers;

 use CodeIgniter\Controller;

 class EvalController extends BaseController
 {
    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the ResumeController
        helper('url'); 

        $this->session = session();
    }

    public function index()
    {
        // Currently user is hardcoded to 3
        // Then is set again once admin navigates to admin page and selects a
        // user to view surveys for. 
        return view('index');
    }

    public function surveys($user_id)
    {
        // $userModel = new \App\Models\UserModel();
        $surveyModel = new \App\Models\SurveyModel();

         // Ensure user exists
         if (!$user_id) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User Not Found');
        }

        if (!empty($search)) {            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the UserModel
            foreach ($surveyModel->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            $surveys = $surveyModel->where($whereClause)->orderBy('title', 'ASC')->findAll();
        } else {
            // If no search query is provided
            $surveys = $surveyModel->orderBy('title', 'ASC')->findAll();
        }
    
        // Fetch related data with pagination (4 surveys per page)
        $data['surveys'] = $surveyModel->where('user_id', $user_id)->paginate(4);
        $data['pager'] = $surveyModel->pager;
        $data['user_id'] = $user_id;

        // make sure this is set in login!!
        // reset user_id to the selected user for admin
        $this->session->set('user_id', $user_id);

        return view('surveys', $data);
    }
    // revised as per lab 5
    // REF prac5: https://alt-5fd17f67f4120.blackboard.com/
    // bbcswebdav/pid-9844314-dt-content-rid-60958335_1/
    // courses/INFS3202_7420_22998/Week5/
    // lab5.html?one_hash=A1C879437DCC5CBDD5C5FF2B03460DE5&f
    // _hash=33A9693F1E2B930E96013FF53B363A58
    public function admin()
    {
        // Create an instance of the UserModel
        $userModel = new \App\Models\UserModel();
        
        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the UserModel
            foreach ($userModel->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            $users = $userModel->where($whereClause)->orderBy('name', 'ASC')->findAll();
        } else {
            // If no search query is provided
            // Retrieve all users, order by name in ascending order
            $users = $userModel->orderBy('name', 'ASC')->findAll();
        }

        $data['users'] = $users;

        return view('admin', $data);
    }

    public function surveyQuestions($survey_id)
    {
        $userModel = new \App\Models\UserModel();
        $surveyModel = new \App\Models\SurveyModel();
        $textQuestionModel = new \App\Models\TextQuestionModel();
        // will need to add text question and multiple question models here
        // maybe options model.

        // Fetch survey details by survey id
        $data['survey'] = $surveyModel->find($survey_id);
        $user_id = $this->session->get('user_id');

        // Ensure user exists
        if (!$data['survey']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Survey Not Found');
        }

        $data['user'] = $userModel->where('user_id', $user_id)->findAll();
        $data['textQuestions'] = $textQuestionModel->where('survey_id', $survey_id)->findAll();

        return view('surveyQuestions', $data);
    }
    
    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    // controller to handle add/edit requests for users.
    // 
    // REF prac5: https://alt-5fd17f67f4120.blackboard.com/
    // bbcswebdav/pid-9844314-dt-content-rid-60958335_1/
    // courses/INFS3202_7420_22998/Week5/
    // lab5.html?one_hash=A1C879437DCC5CBDD5C5FF2B03460DE5&f
    // _hash=33A9693F1E2B930E96013FF53B363A58
    public function addedit($id = null)
     {
         $userModel = new \App\Models\UserModel();

         // debugging request string
         // print($this->request->getMethod());

         if ($this->request->getMethod() === 'POST') {
             $data = $this->request->getPost();
             print_r($data);

            if ($id === null) {
                if ($userModel->insert($data)) {
                    $this->session->setFlashdata('success', 'User added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
                }
            } else {
                if ($userModel->update($id, $data)) {
                    $this->session->setFlashdata('success', 'User updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update user. Please try again.');
                }
            }

            return redirect()->to('/admin');
         }

         $data['user'] = ($id === null) ? null : $userModel->find($id);

         return view('addedit', $data);
     }

    public function delete($id)
    {
        $userModel = new \App\Models\UserModel();

        if ($userModel->delete($id)) {
            $this->session->setFlashdata('success', 'User deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete user. Please try again.');
        }

        return redirect()->to('/admin');
     }

     public function addeditSurvey($id = null)
     {
         $surveyModel = new \App\Models\SurveyModel();
     
         if ($this->request->getMethod() === 'POST') {
             $data = $this->request->getPost();
             // currently hardset but will update when login setup.
             $userId = $this->session->get('user_id'); // Get the current user's ID from the session
    
             if ($userId === null) {
                 $this->session->setFlashdata('error', 'Invalid user ID.');
                 return redirect()->back()->withInput();
             }
     
             $data['user_id'] = $userId; // Add user_id to the data array
             $success = false;
     
             if ($id === null) {
                 $success = $surveyModel->insert($data);
                 $message = $success ? 'Survey added successfully.' : 'Failed to add survey. Please try again.';
             } else {
                 $success = $surveyModel->update($id, $data);
                 $message = $success ? 'Survey updated successfully.' : 'Failed to update survey. Please try again.';
             }
     
             if ($success) {
                 $surveyId = $id ?? $surveyModel->insertID();
                 $survey = $surveyModel->find($surveyId);
                 $userId = $survey['user_id'];
                 $this->session->setFlashdata('success', $message);
                 // This will redirect to addedit questions
                 return redirect()->to('/surveyQuestions/' . $surveyId);
             } else {
                 $this->session->setFlashdata('error', $message);
                 return redirect()->back()->withInput();
             }
         }
     
         $data['survey'] = ($id === null) ? null : $surveyModel->find($id); 
         return view('addeditSurvey', $data);
     }
     
     // User or admin can delete a survey from the dashboard.
     public function deleteSurvey($id)
     {
        // need user id here to redirect
        // issue is how do i get the current user id?
        $model = new \App\Models\SurveyModel();

        if ($model->delete($id)) {
            $this->session->setFlashdata('success', 'Survey deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete survey. Please try again.');
        }

        return redirect()->to('/surveys/2');
     }
}
