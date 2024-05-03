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
    // reference lab 3
     //
    public function admin()
    {
    // Creates an instance of the UserModel class.
    $model = new \App\Models\UserModel();

    // Prepares to fetch data from the database using the UserModel.
    // The data fetched will be stored in the array `$data` under the key 'users'.
    $data['users'] = $model->orderBy('name', 'ASC')                             
                           ->where('status', 'active') 
                           ->findAll(); 

    return view('admin', $data);
    }
}
