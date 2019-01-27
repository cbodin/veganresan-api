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
}
