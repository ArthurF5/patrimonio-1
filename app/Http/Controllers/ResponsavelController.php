<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Cargo;
use App\Models\Setor;
use App\Models\Responsavel;

class ResponsavelController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Responsavel::orderBy('nome', 'asc')->get();
        $cargos = Cargo::orderBy('nome', 'asc')->get();
        $setores = Setor::orderBy('nome', 'asc')->get();

        return view('sistema.responsaveis.index', compact('cargos', 'usuarios', 'setores'));
    }

    public function show($id)
    {
        $responsavel = Responsavel::find($id);
        $setores = Setor::orderBy('nome', 'asc')->get();
        
        return view('sistema.responsaveis.show', compact('responsavel', 'setores'));
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'nome' => 'required|unique:responsaveis|max:255',
            'cargo_id' => 'required|numeric',
            'setor_id' => 'required|numeric',
            'siape' => 'numeric|nullable',
        ]);

        Responsavel::create($request->all());
        return redirect()->back();
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
        Responsavel::find($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Responsavel::destroy($id);
        return redirect()->back();
    }
}
