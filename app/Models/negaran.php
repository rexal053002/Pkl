<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class negaran extends Model
{
    use HasFactory;

    protected $table = "negarans";

    public function kasus() {
        return $this->hasMany(kasus2::class);
    }
    
}
