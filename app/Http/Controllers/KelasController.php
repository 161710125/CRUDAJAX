<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\DataTables\Datatables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
 
    public function json(){
        $sis = Kelas::select('id','nama','kelas','jurusan','jk','alamat','created_at','updated_at');
        return Datatables::of($sis)
        ->addColumn('action',function($sis){
                return '<center><a href="#" class="btn btn-xs btn-primary edit" data-id="'.$sis->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <a href="#" class="btn btn-xs btn-danger delete" id="'.$sis->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a></center>';
            })
            ->make(true);
    }


    public function index()
    {

        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:kelas,nama',
            'kelas'=>'max:12|required',
            'jurusan'=>'max:255|required',
            'jk'=>'max:255|required',
            'alamat'=>'max:255|required'
        ],[
            'nama.unique'=>'Data dengan nama tersebut sudah ada di database',
            'nama.required'=>'Nama tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'jurusan.required'=>'Jurusan tidak boleh kosong',
            'jk.required'=>'Jenis Kelamin tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong'
    ]);
        $kelas = Kelas::create($request->all());
        return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Kelas::find($id);
        return $guru;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|',
            'kelas'=>'max:12|required',
            'jurusan'=>'max:255|required',
            'jk'=>'max:255|required',
            'alamat'=>'max:255|required'
        ],[
            'nama.required'=>'Nama tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'jurusan.required'=>'Jurusan tidak boleh kosong',
            'jk.required'=>'Jenis Kelamin tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong'
    ]);
        $guru = Kelas::find($id);
        $guru->nama = $request->nama;
        $guru->kelas = $request->kelas;
        $guru->jurusan = $request->jurusan;
        $guru->jk = $request->jk;
        $guru->alamat = $request->alamat;
        $succes = $guru->save();
        if ($succes){
            return response()->json([
                'success' => true,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
    }

    public function removedata(Request $request)
    {
        $sis = Kelas::find($request->input('id'));
        if($sis->delete())
        {
            echo 'Data Deleted';
        }
    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $student = Kelas::find($id);
        $output = array(
            'nama'    =>  $student->nama,
            'kelas'     =>  $student->kelas,
            'jurusan'     =>  $student->jurusan,
            'jk'     =>  $student->jk,
            'alamat'     =>  $student->alamat,
        );
        echo json_encode($output);
    }
}
