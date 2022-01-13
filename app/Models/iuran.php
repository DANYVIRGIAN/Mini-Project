<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iuran extends Model
{
    use HasFactory;

    protected $table = "iuran";
    protected $guarded = [
        'id'
    ];

    public function rumah()
    {
        return $this->hasOne(datarumah::class);
    }
}
