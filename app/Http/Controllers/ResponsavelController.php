<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Responsavel::all();
        $cargos = Cargo::all();
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
            Session::flash('status', 'success');
            Session::flash('message', 'Usuário '. $request->name .' criado com sucesso');

            return redirect()->route('responsaveis.index');            
        }
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
        //
    }
}
