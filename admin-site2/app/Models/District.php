<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public $table = 'districts';
    public $primaryKey = 'id';
    public $keyType = 'int';
    public $incrementing = 'true';
    public $timestamps = 'true';

    //division
    public function division()
    {
    	return $this->belongsTo(Division::class);
    }
}
