<?php
namespace App\Traits;

use Encryptor;

trait Encryptation
{
    
  public function getEncryptAttribute($value)
  {
    return Encryptor::encrypt($value);
  }

  public function getDecencryptAttribute($value)
  {
    return Encryptor::decrypt($value);
  }
}