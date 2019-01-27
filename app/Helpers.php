<?php

namespace App;

class Helpers
{
    public static function getAppVersions($platform)
    {
        $path = storage_path('app/app-versions.json');
        $apps = json_decode(file_get_contents($path));

        // Validate platform
        if (!isset($apps->{$platform})) {
            return null;
        }

        return $apps->{$platform};
    }

    public static function getLatestVersion($platform)
    {
        $versions = self::getAppVersions($platform);
        if (!$versions || !sizeof($versions)) {
            return null;
        }

        return $versions[0];
    }

    public static function getAndroidApkDownloadUrl($version)
    {
        return url("storage/releases/veganresan-$version.apk");
    }
}
