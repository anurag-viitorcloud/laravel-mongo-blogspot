<?php

namespace App\Helpers\Core;

use App\Constant\Constant;
use Carbon\Carbon;

class Helper
{
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    public static function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require $filename;
            }
        }
    }

    /**
     * @param $date
     * @param  null  $format
     * @return mixed
     */
    public static function defaultDateTimeFormat($date, $format = Constant::NULL)
    {
        if (empty($format)) {
            $format = config('config-variables.default_date_time_format');
        }

        return Carbon::parse($date)->format($format);
    }

    /**
     * Get logged in user's data
     * 
     * @return mixed
     */
    public static function loggedInUser()
    {
        return auth()->user();
    }
}
