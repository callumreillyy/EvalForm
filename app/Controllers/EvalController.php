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
         return view('surveys');
     }
 }
