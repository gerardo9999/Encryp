<?php

namespace App\Http\Livewire;

use App\Models\EncrypModel;
use App\Traits\Encryptation;
use Livewire\Component;
use PhpParser\Node\Expr\Empty_;

class Encrytp extends Component
{
    use Encryptation;

    public $_id;
    public $numero_tarjeta;
    public $nombre_apellido;
    public $vencimiento;
    public $codigo;
    public $form;
    public $interfaz;


    public $search;
    public $showEncript;

    public EncrypModel $object;
    public $enc;

    public function render()
    {
        return view('livewire.encrytp');
    }
    public function mount()
    {
        $this->form = true;
        $this->enc = false;
        $this->_id = null;
        $this->numero_tarjeta = null;
        $this->nombre_apellido = null;
        $this->vencimiento = null;
        $this->codigo = null;

        $this->interfaz = false;
        $this->showEncript = false; 
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
    public function showSearch()
    {
        $this->interfaz = true;
        $this->form = true;
    }

    public function validateId()
    {
        return EncrypModel::where('id',$this->search)->first() ? true : false;
    }
    public function searchData()
    {
        
        $object = EncrypModel::findOrFail($this->search);
        $this->_id = $object->id;
        $this->nombre_apellido = $object->nombre_apellido;
        $this->codigo = $object->codigo;
        $this->numero_tarjeta = $object->numero_tarjeta;
        $this->vencimiento = $object->vencimiento;
        $this->showEncript = true;    
        $this->enc = true;

    }
    public function DessencriptarBusqueda()
    {
        $this->codigo = $this->getDecencryptAttribute($this->codigo);
        $this->numero_tarjeta = $this->getDecencryptAttribute($this->numero_tarjeta);
        $this->vencimiento = $this->getDecencryptAttribute($this->vencimiento);
        $this->enc = false;
    }
    public function EncriptarBusqueda()
    {
        $this->codigo = $this->getEncryptAttribute($this->codigo);
        $this->numero_tarjeta = $this->getEncryptAttribute($this->numero_tarjeta);
        $this->vencimiento = $this->getEncryptAttribute($this->vencimiento);
        $this->enc = true;
    }
}
