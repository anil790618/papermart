<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsAuthenticNotLogin implements FilterInterface
{
    public function before(RequestInterface $requests, $arguments = null)
    {
        $session =session();
        if (!$session->get('user_key')) 
        {
            return redirect()->to('login');
            header("Refresh:0; url=login.php");
        }


    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}