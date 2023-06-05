<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{
    public function membershipRead()
    {
        $membership = Membership::all();
        return view('superadmin.membershipRead', compact('membership'));
    }

    public function membershipInsert()
    {
        return view('superadmin.membershipInsert');
    }


    public function handleMembershipInsert(Request $r)
    {
        $validated = Validator::make($r->all(), [
            'nama_membership' => 'required',
            'diskon_membership' => 'required|integer|max:30',
            'minimum_profit_membership' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $membership = new Membership;
        $membership->nama_membership = $r->nama_membership;
        $membership->diskon_membership = $r->diskon_membership;
        $membership->minimum_profit_membership = $r->minimum_profit_membership;
        $membership->save();

        return redirect()->route('superAdmin.membershipRead');
    }


    public function membershipUpdate(string $id)
    {
        $membership = Membership::find($id);
        return view('superadmin.membershipUpdate', compact('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function handleMembershipUpdate(Request $r, string $id)
    {
        $validated = Validator::make($r->all(), [
            'nama_membership' => 'required',
            'diskon_membership' => 'required|integer|max:30',
            'minimum_profit_membership' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $membership = Membership::find($id);
        $membership->nama_membership = $r->nama_membership;
        $membership->diskon_membership = $r->diskon_membership;
        $membership->minimum_profit_membership = $r->minimum_profit_membership;
        $membership->save();

        return redirect()->route('superAdmin.membershipRead');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function handleMembershipDelete(string $id)
    {
        Membership::find($id)->delete();
        return redirect()->back();
    }
}
