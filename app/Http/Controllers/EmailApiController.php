<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailApiController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
        $details = [
            'title' => 'Mensagem de ' . config('app.name'),
            'body' => $request->message,
        ];
        Mail::to($request->email)->send(new SendMail($details));

        return response()->json(['message' => 'Email enviado com sucesso!'], 200);
    }
}
