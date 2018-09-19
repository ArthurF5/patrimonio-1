<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CargoController extends Controller
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
        $cargos = Cargo::orderBy('nome', 'asc')->get();
        return view('sistema.cargos.index', compact('cargos'));
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
            'nome' => 'required|unique:cargos|max:255',
        ]);

        $cargo = Cargo::create($request->all());

        if ($cargo) {
            Session::flash('status', 'success');
            Session::flash('message', 'Cargo cadastrado com sucesso');

            return redirect()->back();
        }
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
        if(Cargo::find($id)->update($request->all())) {
            Session::flash('status', 'info');
            Session::flash('message', 'Cargo atualizado.');
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
        if (Cargo::find($id)->responsaveis->isNotEmpty()) {
            Session::flash('status', 'danger');
            Session::flash('message', 'ERRO: Não foi possível excluir. Servidores cadastrados nesse cargo.');

            return redirect()->back();
        }

        Cargo::destroy($id);
        return redirect()->back();

        
    }
}
