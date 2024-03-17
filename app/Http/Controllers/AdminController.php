<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeywords = $request->get('keyword');
        $data['currentPage']= 'admin.index';

        $query  = User::query();
        if($filterKeywords) {
            $query->where('name','like','%' .$filterKeywords . '%');
        }
        $data['admin'] = $query->paginate(5);
        return view ('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
           'email' => 'required|string|max:255|unique:users',
            'role' => 'sometimes',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cek = User::where('email',$request->email);
        if ($cek->first()){
            return redirect()->back()->with('failed','Email sudah terdaftar');
        }

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
           'email' => $request->email,
            'role' => $request->role,
        ]);
        //return redirect()->route('/')->with('status', "Pendaftran Berhasil");\
        //return redirect()->route('daftar.create')->with('status', "Pendaftran Berhasil");
        return redirect()->route('admin.index')->with('status','daftar berhasil');
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
        $data['admin']= User::findOrFail($id);
        return view('admin.edit', $data);
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
         $data = User::findOrFail($id);
        $validator= Validator::make($request->all(),[
            'name' => 'sometimes|string|max:255',
            'password' => 'sometimes|string|min:6',
            'email' => 'sometimes|string|max:255',
            // 'email' => 'required|string|max:255|unique:table,users',
            'role' => 'sometimes',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $existingData = User::where('email', $request->email)->where('id', '!=' , $id)->first();

        if($existingData){
            return redirect()->back()->with('failed', 'Email sama');
        }

        $input= $request->all();

        if($request->input('new_password')){
            $input['password'] = Hash::make($input['new_password']);

        }else{
            $input = Arr::except($input,['password']);
        }

        $data->update($input);
        return redirect()->route('admin.index')->with ('status','Data Berhasil diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $data->delete($data);
        return redirect()->back()->with('status','berhasil di hapus');
    }
}
