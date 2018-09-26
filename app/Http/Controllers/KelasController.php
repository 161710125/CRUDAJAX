<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\DataTables\Datatables;
use File;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
 
    public function json(){
        $sis = Kelas::all();
        return Datatables::of($sis)
        ->addColumn('show_photo', function($sis){
                if ($sis->Photo == NULL){
                    return 'No Image!';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($sis->Photo) .'?'.time().'" alt="">';
            })
        ->addColumn('action',function($sis){
                return '<center><a href="#" class="btn btn-xs btn-primary edit" data-id="'.$sis->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <a href="#" class="btn btn-xs btn-danger delete" id="'.$sis->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a></center>';
            })
            ->rawColumns(['action','show_photo'])->make(true);
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
            'tgl_lahir'=>'required',
            'jk'=>'max:255|required',
            'alamat'=>'max:255|required',
            'hobi'=>'max:225|required'
        ],[
            'nama.unique'=>'Data dengan nama tersebut sudah ada di database',
            'nama.required'=>'Nama tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'jurusan.required'=>'Jurusan tidak boleh kosong',
            'tgl_lahir.required'=>'Tanggal Lahir tidak boleh kosong',
            'jk.required'=>'Jenis Kelamin tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong',
            'hobi.required'=>'Hobi tidak boleh kosong'
    ]);
            $data = new Kelas;
            $data->nama = $request->nama;
            $data->kelas = $request->kelas;
            $data->jurusan = $request->jurusan;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->jk = $request->jk;
            $data->alamat = $request->alamat;
            $data->hobi = implode(", ", $request->hobi);

            $data['Photo'] = null;
            if ($request->hasFile('Photo')){
            $data['Photo'] = '/upload/Photo/'.str_slug($data['nama'], '-').'.'.$request->Photo->getClientOriginalExtension();
            $request->Photo->move(public_path('/upload/Photo/'), $data['Photo']);
            }

            $data->save();
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
        $guru = Kelas::findOrFail($id);
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
            'nama' => 'required',
            'kelas'=>'max:12|required',
            'jurusan'=>'max:255|required',
            'tgl_lahir'=>'required',
            'jk'=>'max:255|required',
            'alamat'=>'max:255|required',
            'hobi'=>'max:225|required'
        ],[
            'nama.required'=>'Nama tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'jurusan.required'=>'Jurusan tidak boleh kosong',
            'jk.required'=>'Jenis Kelamin tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong',
            'hobi.required'=>'Hobi tidak boleh kosong'
    ]);
        $data = Kelas::find($id);
        $data->nama = $request->nama;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->alamat = $request->alamat;
        $data->hobi = implode(", ", $request->hobi);

        $data['Photo'] = $data->Photo;
            if ($request->hasFile('Photo')){
                if (!$data->Photo == NULL){
                unlink(public_path($data->Photo));
            }
            $data['Photo'] = '/upload/Photo/'.str_slug($data['nama'], '-').'.'.$request->Photo->getClientOriginalExtension();
            $request->Photo->move(public_path('/upload/Photo/'), $data['Photo']);
            }
        
        // $data['Photo'] = $data->Photo;
        // if ($request->hasFile('Photo')){
        //     if (!$data->Photo == NULL){
        //         unlink(public_path($data->Photo));
        //     }
        //    $data['Photo'] = '/upload/Photo/'.str_slug($data['nama'], '-').'.'.$request->Photo->getClientOriginalExtension();
        //     $request->Photo->move(public_path('/upload/Photo/'), $data['Photo']);
        // }

        $succes = $data->save();
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
        // $heem = Kelas::findOrFail($id);
        // Kelas::destroy($id);
    }

    public function removedata(Request $request)
    {
        $sis = Kelas::find($request->input('id'));
        if($sis->delete())
        {
            if (!$sis->Photo == NULL){
                unlink(public_path($sis->Photo));
            }
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
            'tgl_lahir'     =>  $student->tgl_lahir,
            'jk'     =>  $student->jk,
            'alamat'     =>  $student->alamat,
            'hobi'      => $student->hobi
        );
        echo json_encode($output);
    }
}
