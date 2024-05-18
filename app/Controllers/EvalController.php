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
            // If the search query is not empty
            
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
            // Retrieve all users, order by name in ascending order
            $surveys = $surveyModel->orderBy('title', 'ASC')->findAll();
        }
    
        // Fetch related data with pagination (4 surveys per page)
        $data['surveys'] = $surveyModel->where('user_id', $user_id)->paginate(4);
        $data['pager'] = $surveyModel->pager;

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
        $model = new \App\Models\UserModel();
        
        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the UserModel
            foreach ($model->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            $users = $model->where($whereClause)->orderBy('name', 'ASC')->findAll();
        } else {
            // If no search query is provided
            // Retrieve all users, order by name in ascending order
            $users = $model->orderBy('name', 'ASC')->findAll();
        }

        $data['users'] = $users;
        return view('admin', $data);
    }
    
    public function account()
    {
        return view('account');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function statistics()
    {
        return view('statistics');
    }

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function createSurvey()
    {
        
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
         $model = new \App\Models\UserModel();

         // debugging request string
         // print($this->request->getMethod());

         if ($this->request->getMethod() === 'POST') {
             $data = $this->request->getPost();

             if ($id === null) {
                 if ($model->insert($data)) {
                     $this->session->setFlashdata('success', 'User added successfully.');
                 } else {
                     $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
                 }
             } else {
                 if ($model->update($id, $data)) {
                     $this->session->setFlashdata('success', 'User updated successfully.');
                 } else {
                     $this->session->setFlashdata('error', 'Failed to update user. Please try again.');
                 }
             }

             return redirect()->to('/admin');
         }

         $data['user'] = ($id === null) ? null : $model->find($id);

         return view('addedit', $data);
     }

    public function delete($id)
    {
        $model = new \App\Models\UserModel();

        if ($model->delete($id)) {
            $this->session->setFlashdata('success', 'User deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete user. Please try again.');
        }

        return redirect()->to('/admin');
     }

     // User or admin can delete a survey from the dashboard.
     public function addeditSurvey($id = null)
     {
        $model = new \App\Models\SurveyModel();

        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();

            if ($id === null) {
                if ($model->insert($data)) {
                    $this->session->setFlashdata('success', 'Survey added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
                }
            } else {
                if ($model->update($id, $data)) {
                    $this->session->setFlashdata('success', 'Survey updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update Survey. Please try again.');
                }
            }

            return redirect()->to('/surveys/2');
        }

        $data['survey'] = ($id === null) ? null : $model->find($id);

        print_r($data);

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
