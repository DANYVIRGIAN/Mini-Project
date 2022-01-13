<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datarumah extends Model
{
    use HasFactory;

    protected $table = "datarumah";
    protected $guarded = [
        'id'
    ];


public function pemilik()
{
    return $this->belongsTo(datawarga::class, 'id_pemilik');
}

public function penghuni()
{
    return $this->belongsTo(datawarga::class, 'id_penghuni');
}

public function rumah()
{
    return $this->belongsTo(rumah::class, 'id_rumah');
}

}

