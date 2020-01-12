<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{

    public function index()
    {
        return view('cadastros.clientes.listar', ['clientes' => Cliente::all()]);
    }

    public function cadastrar(Request $request)
    {
        return view('cadastros.clientes.cadastrar');
    }

    public function editar(Request $request)
    {
        return view('cadastros.clientes.editar', ['cliente' => Cliente::findOrFail($request->input('id'))]);
    }

    public function salvar(Request $request)
    {
        $validacao = $this->validar($request);

        if ($validacao)
        {
            return Redirect::back()->withErrors($validacao);
        }

        $cliente = Cliente::find($request->input('id'));

        if (!$cliente)
        {
            $cliente = new Cliente();
        }

        if ($request->hasFile('foto'))
        {
            if ($cliente)
            {
                Storage::delete($cliente->url_foto);
            }

            $url_foto = $request->file('foto')->store('profile', 'public');
        }

        $cliente->nome     = $request->input('nome');
        $cliente->ddd      = $request->input('ddd');
        $cliente->telefone = $request->input('telefone');
        $cliente->email    = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL);
        $cliente->url_foto = $url_foto ?? $cliente->url_foto;
        $cliente->save();

        return redirect(route('cadastros.clientes.listar'));

    }

    public function remover(Request $request)
    {
        $id = $request->input('id');

        Cliente::find($id)->delete();

        return redirect(route('cadastros.clientes.listar'));
    }

    private function validar(Request $request)
    {
        if ($request->input('id'))
        {
            $email = Rule::unique('clientes', 'email')->ignore($request->input('id'));
        }
        else
        {
            $email = Rule::unique('clientes', 'email');;
        }

        $regras = [
            'nome'     => 'required|max:100',
            'email'    => $email,
            'ddd'      => 'sometimes|max:3',
            'telefone' => 'sometimes|max:10',
            'foto'     => 'image|max:2048',
        ];

        $mensagens = [
            'required' => 'O campo :attribute é obrigatório!',
            'max'      => 'O tamanho máximo de caracteres para o campo :attribute é :max!',
            'image'    => 'O campo :attribute deve ser uma imagem!',
            'unique'   => 'Este email já esta em uso!'
        ];

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails())
        {
            return $validator;
        }

        return false;
    }

}
