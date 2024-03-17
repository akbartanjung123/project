<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaUserController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetNow(Request $request)
    {

       $data['beritauser'] = Berita::all();
       return view('/', $data );
    }
}
