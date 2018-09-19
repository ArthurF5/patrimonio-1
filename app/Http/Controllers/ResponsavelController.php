<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('sistema.responsaveis.index', compact('cargos', 'usuarios'));
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
            'siape' => 'numeric|nullable',
        ]);

        $usuario = Responsavel::create($request->all());

        if ($usuario) {
            Session::flash('status', 'info');
            Session::flash('message', 'Usuário criado.');
        }

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
        if(Responsavel::find($id)->update($request->all())) {
            Session::flash('status', 'info');
            Session::flash('message', 'Usuário atualizado.');
        }

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
        if(Responsavel::destroy($id)) {
            Session::flash('status', 'danger');
            Session::flash('message', 'Usuário excluido.');
        }

        return redirect()->back();
    }
}
