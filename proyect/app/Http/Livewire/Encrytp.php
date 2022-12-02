<?php

namespace App\Http\Livewire;

use App\Models\EncrypModel;
use App\Traits\Encryptation;
use Livewire\Component;

class Encrytp extends Component
{
    use Encryptation;

    public $_id;
    public $numero_tarjeta;
    public $nombre_apellido;
    public $vencimiento;
    public $codigo;
    public $form;

    public function render()
    {
        return view('livewire.encrytp');
    }
    public function mount()
    {
        $this->form = true;

        $this->_id = null;
        $this->numero_tarjeta = null;
        $this->nombre_apellido = null;
        $this->vencimiento = null;
        $this->codigo = null;
    }
    public function saveEncriptation()
    {
        $newData = new EncrypModel();
        $newData->codigo = $this->getEncryptAttribute($this->codigo);
        $newData->numero_tarjeta = $this->getEncryptAttribute($this->numero_tarjeta);
        $newData->vencimiento = $this->getEncryptAttribute($this->vencimiento);
        $newData->nombre_apellido = $this->nombre_apellido;
        $newData->save();

        $this->form = false;

        $this->_id = $newData->id;
        $this->numero_tarjeta = $newData->numero_tarjeta;
        $this->nombre_apellido = $newData->nombre_apellido;
        $this->vencimiento = $newData->vencimiento;
        $this->codigo = $newData->codigo;

        return [
            'data' => $newData
        ];
    }
    public function desencriptarData()
    {
        $this->numero_tarjeta = $this->getDecencryptAttribute($this->numero_tarjeta) ;
        $this->nombre_apellido = $this->nombre_apellido;
        $this->vencimiento = $this->getDecencryptAttribute($this->vencimiento);
        $this->codigo = $this->getDecencryptAttribute($this->codigo);
    }
    public function cerrarForm()
    {
        $this->numero_tarjeta = null;
        $this->nombre_apellido = null;
        $this->vencimiento = null;
        $this->codigo = null;

        $this->form = true;
    }
}
