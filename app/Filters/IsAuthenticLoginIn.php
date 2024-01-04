<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsAuthenticLoginIn implements FilterInterface
{
    public function before(RequestInterface $requests, $arguments = null)
    {
        $session =session();
        if ($session->get('user_key')) 
        {
            return redirect()->to('dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}