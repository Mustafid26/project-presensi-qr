<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        $cek = Absen::where ([
            'ig_sudah_absen' => $request->ig_sudah_absen,
            ])->exists();
        if($cek)
        {
            return redirect ('/index')->with('gagal', 'Anda Sudah Absen');
        }
        Absen::create([
            'ig_sudah_absen' => $request->ig_sudah_absen,
            'tanggal' => now()
        ]);
        return redirect ('/index')->with('success', 'Berhasil!!');
    }
}
