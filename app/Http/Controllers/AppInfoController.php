<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class AppInfoController extends Controller
{
    public function version($platform, $version)
    {
        $path = base_path('app-versions.json');
        $apps = json_decode(file_get_contents($path));

        // Validate platform
        if (!isset($apps->{$platform})) {
            return response('', 404);
        }

        // Grab news and latest version
        $versions = $apps->{$platform};
        $latestVersion = null;
        $news = [];
        $match = false;

        foreach ($versions as $versionData) {
            $latestVersion = $latestVersion ?: $versionData->version;
            if ($versionData->version === $version) {
                $match = true;
                break;
            }

            $news[] = $versionData;
        }

        // If we're not on any specified version, abort
        if (!$match) {
            return response('', 404);
        }

        return [
            'latest_version' => $latestVersion,
            'is_latest' => $latestVersion === $version,
            'download_url' => url("releases/veganresan-$latestVersion.apk"),
            'news' => $news,
        ];
    }
}
