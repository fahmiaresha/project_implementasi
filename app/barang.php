<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    public $timestamps=false;
    protected $primaryKey = 'id_barang';
    protected $table ='barang'; 
    protected $fillable = [
        'nama_barang', 'deskripsi_barang'
    ];
    
}
