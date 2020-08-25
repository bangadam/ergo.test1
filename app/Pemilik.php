<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $guarded = [];

    public function barang() {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
