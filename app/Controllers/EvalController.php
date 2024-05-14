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
            
            // Retrieve users matching the search conditions, order by name in ascending order
            $users = $model->where($whereClause)->orderBy('name', 'ASC')->findAll();
        } else {
            // If no search query is provided
            
            // Retrieve all users, order by name in ascending order
            $users = $model->orderBy('name', 'ASC')->findAll();
        }
        
        // Store the retrieved users in the $data array
        $data['users'] = $users;
        
        // Load the 'admin' view and pass the $data array to it
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

    public function survey()
    {
        return view('survey');
    }


}
