<?php

namespace App\Http\Controllers;

use App\Models\InvitationRegistry;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class InvitationRegistryController extends Controller
{
    public function store(Request $request)
    {
        // dd(route("invitation.show_qrcode"));
        // dd($request->all());
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'guest_count' => 'required|integer',
            'position' => 'required|string',
            'company' =>'required|string|max:255',
            'phone' =>'required|min:1',
            'address' =>'required|string|max:255',
        ]);

        $invitation = InvitationRegistry::create($request->except('_token','_method'));



        $encryptedId = encrypt($invitation->id);
        // dd($encryptedId, decrypt($encryptedId));

        return redirect()->route('invitation.show_qrcode', ['link' => route("invitation.show_data",["encryptedId" => $encryptedId])]);

    }

    public function show_qrcode(Request $request)
    {
        $link = $request->link;
        $qr = QrCode::size(300)->generate($link);
        // dd(route(''));

        return view('invitation_qrcode',compact('qr'));
    }

    public function show_data(Request $request)
    {
        if($request->encryptedId != null){
            $id = decrypt($request->encryptedId);
            $invitation = InvitationRegistry::findOrFail($id);
            return view('invitation_record_data',compact('invitation'));
            // dd($data);
        }
        else
        {
            return redirect()->back()->with('error', "Not Found Record");
        }
    }

}
