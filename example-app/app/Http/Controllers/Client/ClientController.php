<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(Request $request){
    
        $khanhs = DB::table('phong')
        ->select('name','price','image')
        
        ->get();
        
        return view('client.index', compact('khanhs'));
    }
}