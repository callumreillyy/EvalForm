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

        // load session
        $this->session = session();
    }

    public function index()
    {
        return view('index');
    }

    public function surveys()
    {
        $surveys_json = '{
        "surveys": [
            {
                "title": "Survey 1",
                "description": "Description of Survey 1"
            },
            {
                "title": "Survey 2",
                "description": "Description of Survey 2"
            },
            {
                "title": "Survey 3",
                "description": "Description of Survey 3"
            },
            {
                "title": "Survey 4",
                "description": "Description of Survey 4"
            }
        ]
        }';
        
        $data['surveys'] = json_decode($surveys_json, true); 
        # test json passed
        # echo '<pre>';
        # print_r($data['surveys']);
        # echo '<pre>';

        return view('surveys', $data);
    }
    // revised as per lab 5
    // REF prac5: https://alt-5fd17f67f4120.blackboard.com/
    // bbcswebdav/pid-9844314-dt-content-rid-60958335_1/
    // courses/INFS3202_7420_22998/Week5/
    // lab5.html?one_hash=A1C879437DCC5CBDD5C5FF2B03460DE5&f
    // _hash=33A9693F1E2B930E96013FF53B363A58
    public function addedit($id = null)
    {
        $model = new \App\Models\UserModel();
        // Check if the request is a POST request (form submission).
        if ($this->request->getMethod() === 'post') {
            // Retrieve the submitted form data.
            $data = $this->request->getPost();
    
            // If no ID, add operation.
            if ($id === null) {
                if ($model->insert($data)) {
                    // If the user is successfully added, set a success message.
                    $this->session->setFlashdata('success', 'User added successfully.');
                } else {
                    // If the addition fails, set an error message.
                    $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
                }
            } else {
                // If an ID is provided, it's an edit operation.
                if ($model->update($id, $data)) {
                    // If the user is successfully updated, set a success message.
                    $this->session->setFlashdata('success', 'User updated successfully.');
                } else {
                    // If the update fails, set an error message.
                    $this->session->setFlashdata('error', 'Failed to update user. Please try again.');
                }
            }
    
            // Redirect back to the admin page after the operation.
            return redirect()->to('/admin');
        }
    
        // If the request is a GET request, load the form with existing user data (for edit) or as blank (for add).
        $data['user'] = ($id === null) ? null : $model->find($id);
    
        // Display the add/edit form view, passing in the user data if available.
        return view('addedit', $data);
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

    public function survey()
    {
        return view('survey');
    }


}
