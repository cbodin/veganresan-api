<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class MobileAppVersionController extends Controller
{
    public function android()
    {
        $version = env('ANDROID_APP_VERSION', null);
        return response()->json(['version' => $version]);
    }
}
