<?php

use Illuminate\Support\Facades\Http;

class ApiHttp
{
    public static function getApi(String $url)
    {
        return Http::get($url);
    }

    public static function postApi(String $url, $request)
    {
        return Http::post($url, $request);
    }
}