<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
class BukuController extends Controller
{
    public function index(Request $request) {
        $data_buku = Buku::orderBy('id', 'desc')->get();
            
        $jumlah_buku = $data_buku->count(); 
        $total_harga = $data_buku->sum('harga');
    
        return view('index', compact('data_buku', 'jumlah_buku', 'total_harga'));
    }
}
