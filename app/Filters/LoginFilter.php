<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Config\Services;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        
        // Check if the user is not logged in
        if (!$session->get('isLoggedIn')) {
            // Load the view with the template
            $view = Services::renderer();
            $body = $view->setData([])->render('notLoggedIn');

            // Prepare a response object to return a message
            $response = Services::response();
            $response->setStatusCode(200); // You can set this to 401 if it's an unauthorized access
            $response->setBody($body);
            return $response; // Return the response object with the message
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after the controller method is executed
    }
}