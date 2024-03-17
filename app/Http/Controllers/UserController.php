<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeywords = $request->get('keyword');
        $data['currentPage']= 'user.index';

        $query  = Daftar::query();
        if($filterKeywords) {
            $query->where('nama','like','%' .$filterKeywords . '%');
        }
        $data['user'] = $query->paginate(5);
        return view ('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $data['daftar']= Daftar::findOrFail($id);
      return view('user.edit', $data);
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
        $data = Daftar::findOrFail($id);
        $validator= Validator::make($request->all(),[
            'nama' => 'sometimes|string|max:255',
            'alamat' => 'sometimes',
            'pendidikan' => 'sometimes|string|max:255',
            'umur' => 'sometimes|string|max:255',
            'pekerjaan' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:255',
            'tanggal' => 'sometimes|string|max:255',
            'photo' => 'sometimes|mimes:png,jpg|max:2048',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $existingData = Daftar::where('phone', $request->phone)->where('id', '!=' , $id)->first();

        if($existingData){
            return redirect()->back()->with('failed', 'No handphne sama');
        }

        $input= $request->all();
        if($request->hasFile('photo')){
            if($request->file('photo')->isValid()){
                Storage::disk('upload')->delete($data->photo);
                $photo = $request->file('photo');
                $extensions = $photo->getClientOriginalExtension();
                $photoUpload = "photo/". date('YmdHis').".".$extensions;
                $photoPath = env('UPLOAD_PATH'). "/photo";
                $request->file('photo')->move($photoPath, $photoUpload);
                $input['photo'] = $photoUpload;
            }

        }
        $data->update($input);
        return redirect()->route('user.index')->with ('status','Data Berhasil diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Daftar::findOrFail($id);
        $input= Storage::disk('upload')->delete($data->photo);
        $data->delete($input);
        return redirect()->back()->with('status','berhasil di hapus');
    }

    public function btnlaporan()
    {
        return view('laporan.index');
    }
    public function cetakPdf($tgl_awal, $tgl_akhir){

        $cetakPdf = Daftar::whereBetween ('tanggal', [$tgl_awal,$tgl_akhir])->latest()->get();
        $pdf = Pdf::loadView('laporan.cetakLaporan',compact('cetakPdf'));
        $pdf->setPaper('A4');
        return $pdf->stream();

    }
    public function cetakId($id){
        $cetakId['cetakId'] = Daftar::findOrFail($id);
        $pdf = Pdf::loadView('laporan.cetakId',compact('cetakId'));
        $pdf->setPaper('A4');
        return $pdf->stream();
    }


    public function tampil (Request $request)
    {
        $filterKeywords = $request->get('keyword');
        $data['currentPage']= 'tampil.tampil';

        $query  = Daftar::query();
        if($filterKeywords) {
            $query->where('nama','like','%' .$filterKeywords . '%');
        }
        $data['tampil'] = $query->paginate(5);
        return view ('tampil.tampil', $data);
    }

}
