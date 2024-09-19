<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function saveSignatureData(Request $request)
    {
        $request->validate([
            'pejabat_1' => 'required|string|max:255',
            'nip_1' => 'required|string|max:20',
            'pejabat_2' => 'required|string|max:255',
            'nip_2' => 'required|string|max:20',
        ]);

        session([
            'pejabat_1' => $request->input('pejabat_1'),
            'nip_1' => $request->input('nip_1'),
            'pejabat_2' => $request->input('pejabat_2'),
            'nip_2' => $request->input('nip_2'),
        ]);

        return redirect()->route('print.super');
    }
}

