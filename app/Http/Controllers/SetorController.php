<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetorController extends Controller
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
        $setores = Setor::orderBy('nome', 'asc')->get();

        return view('sistema.setores.index', compact('setores'));
    }

    public function show($id)
    {
        $setor = Setor::find($id);
        
        return view('sistema.setores.show', compact('setor'));
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
            'nome' => 'required|unique:setores|max:255',
        ]);

        $setor = Setor::create($request->all());

        if ($setor) {
            
            Session::flash('status', 'success');
            Session::flash('message', 'Setor '. $request->name .' criado com sucesso');

            return redirect()->back();
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
        if(Setor::find($id)->update($request->all())) {
            Session::flash('status', 'info');
            Session::flash('message', 'Setor atualizado.');
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
        if(Setor::destroy($id)) {
            Session::flash('status', 'danger');
            Session::flash('message', 'Setor excluido.');
        }

        return redirect()->back();
    }
}
