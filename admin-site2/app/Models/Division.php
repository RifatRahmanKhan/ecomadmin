<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public $table = 'divisions';
    public $primaryKey = 'id';
    public $keyType = 'int';
    public $incrementing = 'true';
    public $timestamps = 'true';

    //districts
    public function districts()
    {
    	return $this->hasMany(District::class);
    }
}
