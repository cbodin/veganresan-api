<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class LoginController extends Controller
{
    public function validateLogin()
    {
        return ['valid' => true];
    }
}
