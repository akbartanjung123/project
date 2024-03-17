<?php

namespace App\Http\Controllers;

use App\Models\Standar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;

class StandarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeywords = $request->get('keyword');
        $data['currentPage']= 'standar.index';

        $query  = Standar::query();
        if($filterKeywords) {
            $query->where('telepon','like','%' .$filterKeywords . '%');
        }
        $data['standar'] = $query->paginate(5);
        return view ('standar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('standar.create');
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
            'jenis' => 'required',
            'persyartan' => 'required',
            'biaya' => 'required',
            'waktu' => 'required',
            'alur' => 'required',
            'telepon' => 'required',

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }



        Standar::create([
            'jenis' => $request->jenis,
           'persyartan' => $request->persyartan,
            'biaya' => $request->biaya,
            'waktu' => $request->waktu,
            'alur' => $request->alur,
             'telepon' => $request->telepon,
        ]);
        //return redirect()->route('/')->with('status', "Pendaftran Berhasil");\
        //return redirect()->route('daftar.create')->with('status', "Pendaftran Berhasil");
        return redirect()->route('standar.index')->with('status','data berhasil masuk');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $standar = Standar::findOrFail($id);
        return view('standar.show',compact('standar'));
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
        $data = Standar::findOrFail($id);

        $data->delete($data);
        return redirect()->back()->with('status','berhasil di hapus');
    }
    public function tampil2 (Request $request)
    {
        $filterKeywords = $request->get('keyword');
        $data['currentPage']= 'tampil2.tampil2';

        $query  = Standar::query();
        if($filterKeywords) {
            $query->where('telepon','like','%' .$filterKeywords . '%');
        }
        $data['tampil2'] = $query->paginate(12);
        return view ('tampil2.tampil2', $data);
    }
    public function show2 (Request $request,$id)
    {
        $standar = Standar::findOrFail($id);
        return view('tampil2.show',compact('standar'));
    }
}
