<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Blocks any request from a visitor who is not logged in.
 * Registered as the "auth" alias in app/Config/Filters.php and
 * attached to the protected routes in app/Config/Routes.php.
 */
class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if ($session->get('isLoggedIn') === true) {
            return; // logged in: let the request continue to the controller
        }

        // Remember the page they wanted so we can send them back after login
        if (strtolower($request->getMethod()) === 'get') {
            $session->set('intended_url', current_url());
        }

        return redirect()->to('/login')->with('error', 'Please log in to continue.');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing to do after the controller runs
    }
}
