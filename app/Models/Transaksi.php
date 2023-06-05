<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_customer','nomor_transaksi','tanggal_transaksi','diskon'];

    public function transaksiDetails(){
        return $this->hasMany(DetailTransaksi::class,'id_transaksi','id');
    }
}
