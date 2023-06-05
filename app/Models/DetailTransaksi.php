<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_transaksi','id_valas','nama_valas','rate','quantity'];

    public function transaksiDetails(){
        return $this->belongsTo(Transaksi::class,'id_transaksi','id');
    }
}
