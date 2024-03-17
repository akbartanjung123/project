<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
            'alamat' => 'required',
            'pendidikan' => 'required|string|max:255',
            'umur' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'tanggal' => 'sometimes|string|max:255',
            'photo' => 'required|mimes:png,jpg|max:2048',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cek = Daftar::where('phone',$request->phone);
        if ($cek->first()){
            return redirect()->back()->with('failed','No handphone sudah terdaftar');
        }



        $input= $request->all();
        if($request->file('photo')->isValid()){
            $photo = $request->file('photo');
            $extensions = $photo->getClientOriginalExtension();
            $photoUpload = "photo/". date('YmdHis').".".$extensions;
            $photoPath = env('UPLOAD_PATH'). "/photo";
            $request->file('photo')->move($photoPath, $photoUpload);
            $input['photo'] = $photoUpload;
        }
        Daftar::create($input);
        //return redirect()->route('/')->with('status', "Pendaftran Berhasil");\
        //return redirect()->route('daftar.create')->with('status', "Pendaftran Berhasil");
        return redirect()->back()->with('status','daftar berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
