<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TransaksiController extends Controller{

    public function transaksiRead() {
        $transaksi = Transaksi::with('transaksiDetails')->get();
        return view('admin.transaksiRead', compact('transaksi'));
    }
    public function transaksiInsert() {
        return view('admin.transaksiInsert');
    }
    public function transaksiUpdate(string $id){
        $transaksi = DetailTransaksi::with('transaksiDetails')->where('id','like',$id)->first();
        return view('admin.transaksiUpdate',compact('transaksi'));
    }
    public function transaksiSuperAdmin(){
        $transaksi = Transaksi::with('transaksiDetails')->get();
        return view('superadmin.transaksiSuperAdmin', compact('transaksi'));
    }
    public function handleTransaksiUpdate(Request $r, string $id){
        $validated = Validator::make($r->all(), [
            'id_customer' => [
                'required',
                Rule::exists('customers','id')
            ],
            'id_valas' => [
                'required',
                Rule::exists('valas','id')
            ],
            'nomor_transaksi' => 'required',
            'tanggal_transaksi' => 'required',
            'diskon' => 'required|integer|max:30',
            'rate' => 'required',
            'quantity' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }


        $detailTransaksi = DetailTransaksi::find($id);
        $detailTransaksi->id_valas = $r->id_valas;
        $detailTransaksi->rate = $r->rate;
        $detailTransaksi->quantity = $r->quantity;
        $detailTransaksi->save();

        $transaksi = Transaksi::find($detailTransaksi->id_transaksi);
        $transaksi->id_customer = $r->id_customer;
        $transaksi->nomor_transaksi = $r->nomor_transaksi;
        $transaksi->tanggal_transaksi = $r->tanggal_transaksi;
        $transaksi->diskon = $r->diskon;
        $transaksi->save();

        return redirect()->route('admin.transaksiRead');
    }
    public function handleTransaksiInsert(Request $r){
        $validated = Validator::make($r->all(), [
            'id_customer' => [
                'required',
                Rule::exists('customers','id')
            ],
            'id_valas' => [
                'required',
                Rule::exists('valas','id')
            ],
            'nomor_transaksi' => 'required',
            'tanggal_transaksi' => 'required',
            'diskon' => 'required|integer|max:30',
            'rate' => 'required',
            'quantity' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }

        $transaksi = new Transaksi;
        $transaksi->id_customer = $r->id_customer;
        $transaksi->nomor_transaksi = $r->nomor_transaksi;
        $transaksi->tanggal_transaksi = $r->tanggal_transaksi;
        $transaksi->diskon = $r->diskon;
        $transaksi->save();

        $detailTransaksi = new DetailTransaksi;
        $id_transaksi = $transaksi->id;
        $detailTransaksi->id_transaksi = $id_transaksi;
        $detailTransaksi->id_valas = $r->id_valas;
        $detailTransaksi->rate = $r->rate;
        $detailTransaksi->quantity = $r->quantity;
        $detailTransaksi->save();

        return redirect()->route('admin.transaksiRead');
    }
    public function handleTransaksiDelete(string $id){
        DetailTransaksi::find($id)->delete();
        return redirect()->back();
    }
}
