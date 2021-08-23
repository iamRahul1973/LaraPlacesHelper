<?php

namespace App\SerVices;

use App\Exceptions\InvalidArgumentException;

class Places
{
    protected static $result;

    public static function countries()
    {
        $contents = file_get_contents(storage_path('places/countries.json'));
        self::$result = json_decode($contents, true);
        return new self();
    }

    public static function states(string $countryCode)
    {
        $contents = file_get_contents(storage_path("places/states/{$countryCode}.json"));
        self::$result = json_decode($contents, true);
        return new self();
    }

    public static function districts(string $countryCode, string $stateCode)
    {
        $contents = file_get_contents(storage_path("places/districts/{$countryCode}.json"));
        self::$result = json_decode($contents, true)[$stateCode];
        return new self();
    }

    public function get()
    {
        return self::$result;
    }
}
