<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pessoa;
use Illuminate\Validation\Rule;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDados = json_encode([
            ["titulo"=>"Home","url"=>route('home')],
            ["titulo"=>"Lista de Pessoas","url"=>""]
        ]);
    
        $listaModelo = Pessoa::select('id','nome','email','ddd','telefone')->paginate(10);
        return view('admin.pessoas.index',compact('listaDados','listaModelo'));
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
        $data = $request->all();
        $validacao = \Validator::make($data,[
          'nome' => 'required|string|max:255|min:2',
          'email' => 'required|string|email|max:255|unique:users',
          'ddd' => 'required|string|min:2|max:3',
          'telefone' => 'required|string|min:9|max:9'
        ]);
  
        if($validacao->fails()){
          return redirect()->back()->withErrors($validacao)->withInput();
        }
        Pessoa::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pessoa::find($id);
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
        $data = $request->all();
          $validacao = \Validator::make($data,[
            'nome' => 'required|string|max:255|min:2',
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($id)],
            'ddd' => 'required|string|min:2|max:3',
            'telefone' => 'required|string|min:9|max:9'
          ]);
          if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
          }
          Pessoa::find($id)->update($data);
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
        Pessoa::find($id)->delete();
        return redirect()->back();
    }
}
