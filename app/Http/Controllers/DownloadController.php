<?php

namespace App\Http\Controllers;

use App\Helpers;
use Laravel\Lumen\Routing\Controller;

class DownloadController extends Controller
{
    public function download()
    {
        $latestAndroidVersion = Helpers::getLatestVersion('android');
        $androidApkUrl = Helpers::getAndroidApkDownloadUrl($latestAndroidVersion->version);

        return view('download', [
            'android' => [
                'version' => $latestAndroidVersion->version,
                'apkUrl' => $androidApkUrl,
            ],
        ]);
    }
}
