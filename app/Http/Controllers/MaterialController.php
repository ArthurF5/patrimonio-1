<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Material;
use App\Models\Responsavel;

use Illuminate\Http\Request;

class MaterialController extends Controller
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
        $responsaveis = Responsavel::orderBy('nome', 'asc')->get();
        $materiais = Material::orderBy('nome', 'asc')->get();
        
        return view('sistema.materiais.index', compact('setores', 'responsaveis', 'materiais'));
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
            'nome' => 'required|max:255',
            'tombamento' => 'nullable|numeric|unique:materiais',
            'valor' => 'required|numeric',
            'responsavel_id' => 'required|numeric',
            'setor_id' => 'required|numeric',
        ]);

        Material::create($request->all());
        return back();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Material::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Material::destroy($id);
        return back();
    }

    public function exchange(Request $request)
    {
        $materiais = Material::find($request->materiais);
        $dono = $materiais->first()->responsavel;
        $responsaveis = Responsavel::where('id', '!=', $dono->id)->orderBy('nome')->get();

        return view('sistema.materiais.exchange', compact('materiais', 'responsaveis'));
    }

    public function change(Request $request)
    {
        $materiais = Material::find($request->materiais);
        $responsavel = Responsavel::find($request->responsavel);

        foreach ($materiais as $material) {
            $material->update(['responsavel_id' => $responsavel->id, 'setor_id' => $responsavel->setor->id]);
        }

        return redirect()->route('responsaveis.index');
        

    }

    public function AjaxServidoresPorSetor(Request $request)
    {
        $response = [
            'status' => 403,
            'msg' => 'Forbbiden',
        ];

        if ($request->ajax()) {

            $response = [
                'status' => 200,
                'msg' => 'Success',
            ];

            $servidores = Setor::find($request->setor)->servidores;

            
            if ($servidores->isNotEmpty()) {
                return response()->json($servidores);
            }

        }

        return response()->json($response);
    }
}
