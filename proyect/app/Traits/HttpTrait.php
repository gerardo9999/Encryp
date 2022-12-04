<?php
namespace App\Traits;

use ApiHttp;

trait HttpTrait
{   
    public $baseUrl = 'https://jsonplaceholder.typicode.com/';

    public function getHttpClient($route){
        return ApiHttp::getApi($this->baseUrl . $route);
    }

    public function postHttpClient($route,$request){
        return ApiHttp::postApi($this->baseUrl . $route, $request);
    }
}