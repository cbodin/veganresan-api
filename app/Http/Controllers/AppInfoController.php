<?php

namespace App\Http\Controllers;

use App\Helpers;
use Laravel\Lumen\Routing\Controller;

class AppInfoController extends Controller
{
    public function version($platform, $version)
    {
        $versions = Helpers::getAppVersions($platform);
        if (!$versions) {
            return response('', 404);
        }

        // Grab news and latest version
        $latestVersion = null;
        $news = [];
        $match = false;

        foreach ($versions as $versionData) {
            $latestVersion = $latestVersion ?: $versionData->version;
            if ($versionData->version === $version) {
                $match = true;
                break;
            }

            $news = array_merge($news, $versionData->news);
        }

        // If we're not on any specified version, abort
        if (!$match) {
            return response('', 404);
        }

        return [
            'latest_version' => $latestVersion,
            'is_latest' => $latestVersion === $version,
            'download_url' => url("download"),
            'news' => $news,
        ];
    }
}
