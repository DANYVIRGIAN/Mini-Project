<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datawarga extends Model
{
    use HasFactory;

    protected $table = "datawarga";
    protected $guarded = [
        'id'
    ];

    public function pemilik()
    {
        return $this->hasOne(datarumah::class);
    }
    
    public function penghuni()
    {
        return $this->hasMany(datarumah::class);
    }    
}