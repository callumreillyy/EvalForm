<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Config\Services;
use CodeIgniter\View\View;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();

        // Check if the user is not an admin
        if (!$session->get('isAdmin')) {
            // Load the view with the template
            $view = Services::renderer();
            $body = $view->setData([])->render('accessDenied');

            // Prepare a response object to return the view
            $response = Services::response();
            $response->setStatusCode(403); // Appropriate status code for forbidden access
            $response->setBody($body);
            return $response; // Return the response object with the view
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after the controller method is executed
    }
}
