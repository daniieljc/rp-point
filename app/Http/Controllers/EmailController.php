<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;


class EmailController extends Controller
{
    public function requestServer(Request $request)
    {
        $subject = $request->input('subjet');
        $subject = ucfirst(trans($subject));

        $for = "contact@rp-point.info";
        $email = $request->input('email');

        Mail::send('email.erequest', $request->all(), function ($msj) use ($subject, $for, $email) {
            $msj->from($email, "Rp Point List");
            $msj->subject($subject);
            $msj->to($for);
        });

        return redirect()->back();
    }
}
