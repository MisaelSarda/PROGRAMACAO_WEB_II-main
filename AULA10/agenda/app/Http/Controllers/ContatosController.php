<?php

namespace App\Http\Controllers;
use App\Models\Contato;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = Contato::all();

        return view ('contatos.index',compact ('contatos'));
    }

    public function create()    
    {
        return view ('contatos.create');
    }

    public function store(Request $request)
    {
    // Validate the request data
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefone' => 'required|string|max:20',
    ]);

    // Create a new contact
    $contato = new Contato();
    $contato->nome = $request->input('nome');
    $contato->email = $request->input('email');
    $contato->telefone = $request->input('telefone');
    $contato->cidade = $request->input('cidade');
    $contato->estado = $request->input('estado');

    if ($contato->save()) {
        // If the contact is saved successfully, redirect to the index page
        return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso!');
    }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contato = Contato::findOrFail($id);

        return view('contatos.show', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contato = Contato::find($id);
        $contato->nome =$request->input('nome');
        $contato->email=$request->input ('email');
        $contato->telefone=$request->input('telefone');
        $contato->cidade=$request->input('cidade');
        $contato->estado=$request->input('estado');
        if ($contato->save()) {
            return redirect ('contatos');
        }    
    }


    public function destroy(string $id)
    {
        $contato=Contato::find($id);
        if ($contato->delete()) {
            return redirect ('contatos');
        }
    }
}
