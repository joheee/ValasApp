<?php

namespace App\Http\Controllers;

use App\Models\Valas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\VarDumper;

class ValasController extends Controller
{
    public function valasRead(){
        $valas = Valas::all();
        return view('admin.valasRead', compact('valas'));
    }

    public function valasInsert(){
        return view('admin.valasInsert');
    }

    public function handleValasInsert(Request $r){
        $validated = Validator::make($r->all(), [
            'nama_valas' => 'required',
            'nilai_jual' => 'required',
            'nilai_beli' => 'required',
            'tanggal_rate' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $valas = new Valas;
        $valas->nama_valas = $r->nama_valas;
        $valas->nilai_jual = $r->nilai_jual;
        $valas->nilai_beli = $r->nilai_beli;
        $valas->tanggal_rate = $r->tanggal_rate;
        $valas->save();

        return redirect()->route('admin.valasRead');
    }

    public function handleValasDelete(string $id)
    {
        Valas::find($id)->delete();
        return redirect()->back();
    }

    public function valasUpdate(string $id)
    {
        $valas = Valas::find($id);
        return view('admin.valasUpdate', compact('valas'));
    }

    public function handleValasUpdate(Request $r, string $id)
    {
        $validated = Validator::make($r->all(), [
            'nama_valas' => 'required',
            'nilai_jual' => 'required',
            'nilai_beli' => 'required',
            'tanggal_rate' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $valas = Valas::find($id);
        $valas->nama_valas = $r->nama_valas;
        $valas->nilai_jual = $r->nilai_jual;
        $valas->nilai_beli = $r->nilai_beli;
        $valas->tanggal_rate = $r->tanggal_rate;
        $valas->save();

        return redirect()->route('admin.valasRead');
    }
}
