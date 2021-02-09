<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasus2 extends Model
{
    use HasFactory;

    protected $table = "kasus2";

    public function negara() {
        return $this->belongsTo(negaran::class);
    }
}
