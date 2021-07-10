<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampusModel;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $daftarkampus = CampusModel::all();
        if($request->ajax()){
            return datatables()->of($daftarkampus)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->kodeuniv.'" data-original-title="Edit" class="edit edit-post btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->kodeuniv.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
        return view('index');
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
        $foto = $request->file('gambar');

        $name = $foto->getClientOriginalName();

        $folderlogo = 'assets/img';
        $foto->move($folderlogo,$name);
        
        $post   =   CampusModel::updateOrCreate(['kodeuniv' => $request->kodeuniv],
                    [
                        'logo' => $name,
                        'nama' => $request->nama,
                        'tahun' => $request->tahun,
                        'akreditasi' => $request->akreditasi,
                        'status' => $request->status,
                        'alamat' => $request->alamat,
                        'peringkat_lokal' => $request->peringkat_lokal,
                        'contact' => $request->contact,
                    ]); 
        return response()->json($post);
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
        $where = array('kodeuniv' => $id);
        $post  = CampusModel::where($where)->first();
     
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kodeuniv)
    {
        $post = CampusModel::where('kodeuniv',$kodeuniv)->delete();
     
        return response()->json($post);
    }
}
