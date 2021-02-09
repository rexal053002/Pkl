<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasus extends Model
{
    use HasFactory;

    protected $table = "kasuses";
    protected $fillable = ['positif','sembuh','meninggal','tanggal','id_rw'];
    public $timestamps = true;

    public function rw() {
        return $this->belongsTo(rw::class, 'id_rw');
    }
}
