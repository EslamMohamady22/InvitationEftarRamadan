<?php

namespace App\Http\Controllers;

use App\Models\InvitationRegistry;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;
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
            'company' => 'required|string|max:255',
            'phone' => 'required|min:1',
        ]);

        $invitation = InvitationRegistry::create($validatedData);



        $encryptedId = encrypt($invitation->id);
        // dd($encryptedId, decrypt($encryptedId));

        return redirect()->route('invitation.show_qrcode', ['link' => route("invitation.show_data", ["encryptedId" => $encryptedId]), 'id' =>$invitation->id]);
    }

    public function show_qrcode(Request $request)
    {
        $link = $request->link;
        $invetationCode = "R-46-".$request->id;
        $qr = QrCode::size(200)->generate($link);

        $data = InvitationRegistry::findOrFail($request->id);

        return view('invitation_qrcode', compact('qr','invetationCode','data'));
    }

    public function show_data(Request $request)
    {
        if ($request->encryptedId != null) {
            $id = decrypt($request->encryptedId);
            $invitation = InvitationRegistry::findOrFail($id);
            return view('invitation_record_data', compact('invitation'));
            // dd($data);
        } else {
            return redirect()->back()->with('error', "Not Found Record");
        }
    }

    public function show_all()
    {
        $invitations =  InvitationRegistry::all();
        return view('show_all', compact('invitations'));
    }


}
