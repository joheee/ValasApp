<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_membership','nama_customer','alamat_customer'];

    public function customerMemberships(){
        return $this->belongsTo(Membership::class,'id_membership','id');
    }
}
