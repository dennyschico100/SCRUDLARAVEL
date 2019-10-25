<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\libro;

class libroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $libro=DB::select('select * from libros ');
    
        return view('libro.index')->with('libro',$libro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libro.create');
    }

    public function search(Request $request){

        $busqueda=$request->get('txtbuscar');
        $libro=DB::table('libros')->where('nombre','LIKE',"%{$busqueda}%")->get();

        
        return view('libro.index')->with('libro',$libro);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'nombre'=>'required',
            'detalle'=>'required',
            'autor'=>'required',
               
        ]

        );

        $libro=new libro();
        $libro->nombre=$request->input('nombre');
        $libro->detalle=$request->input('detalle');
        $libro->autor=$request->input('autor');
        $libro->save();
        return redirect('/libro')->with('success','LIBRO GUARDADO');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro=libro::findorFail($id);
        return view('libro.show')->with('libro',$libro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro=libro::findorFail($id);
        return view('libro.edit')->with('libro',$libro);
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
         $this->validate($request,[

            'nombre'=>'required',
            'detalle'=>'required',
            'autor'=>'required',
               
        ]

        );

        $libro=new libro();
        $libro->nombre=$request->input('nombre');
        $libro->detalle=$request->input('detalle');
        $libro->autor=$request->input('autor');
        $libro->save();
        return redirect('/libro')->with('success','LIBRO GUARDADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             $libro=libro::findorFail($id);
        $libro->delete();
        return redirect('/')->with('success','LIBRO ELIMINADO');
     

    }

}