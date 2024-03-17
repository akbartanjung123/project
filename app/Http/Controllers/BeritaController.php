<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeywords = $request->get('keyword');
        $data['currentPage']= 'berita.index';

        $query  = Berita::query();
        if($filterKeywords) {
            $query->where('judul','like','%' .$filterKeywords . '%');
        }
        $data['berita'] = $query->paginate(5);
        return view ('berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
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
            'judul' => 'required',
            'isi' => 'required',
            'photo_berita' => 'required|mimes:png,jpg|max:2048',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $input= $request->all();
        if($request->file('photo_berita')->isValid()){
            $photo = $request->file('photo_berita');
            $extensions = $photo->getClientOriginalExtension();
            $photoUpload = "berita/". date('YmdHis').".".$extensions;
            $photoPath = env('UPLOAD_PATH'). "/berita";
            $request->file('photo_berita')->move($photoPath, $photoUpload);
            $input['photo_berita'] = $photoUpload;
        }
        Berita::create($input);
        return redirect()->route('berita.index')->with('status', "Berita  Berhasil");
        //return redirect()->route('daftar.create')->with('status', "Pendaftran Berhasil");

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
        $data['berita']= Berita::findOrFail($id);
        return view('berita.edit', $data);
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
        $data = Berita::findOrFail($id);
        $validator= Validator::make($request->all(),[
            'judul' => 'sometimes',
            'isi' => 'sometimes',
            'photo_berita' => 'sometimes|mimes:png,jpg|max:2048',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $input= $request->all();
        if($request->hasFile('photo_berita')){
            if($request->file('photo_berita')->isValid()){
                Storage::disk('upload')->delete($data->photo_berita);
                $photo = $request->file('photo_berita');
                $extensions = $photo->getClientOriginalExtension();
                $photoUpload = "berita/". date('YmdHis').".".$extensions;
                $photoPath = env('UPLOAD_PATH'). "/berita";
                $request->file('photo_berita')->move($photoPath, $photoUpload);
                $input['photo_berita'] = $photoUpload;
            }

        }
        $data->update($input);
        return redirect()->route('berita.index')->with ('status','Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::findOrFail($id);

        $data->delete($data);
        return redirect()->back()->with('status','berhasil di hapus');
    }
}
