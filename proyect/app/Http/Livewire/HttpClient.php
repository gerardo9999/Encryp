<?php

namespace App\Http\Livewire;

use App\Traits\HttpTrait;
use Livewire\Component;

class HttpClient extends Component
{
    use HttpTrait;

    public $data;

    public function render()
    {
        return view('livewire.http-client');
    }

    public function getData(){
        $this->data = json_decode($this->getHttpClient('todos/1'));
        dd($this->data);
    }
}
