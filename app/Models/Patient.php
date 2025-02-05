<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $guarded=[];

    public function panic(){
        return $this->hasMany(PanicHistory::class,'patient_id');
    }
}
