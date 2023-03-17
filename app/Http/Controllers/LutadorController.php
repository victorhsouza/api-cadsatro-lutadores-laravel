<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lutador;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LutadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lutador::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lutador = new Lutador();
        $lutador->nome = $request->nome;
        $lutador->altura = $request->altura;
        $lutador->peso = $request->peso;
        $lutador->nacionalidade = $request->nacionalidade;


        if ($lutador->peso < 55 || $lutador->peso > 120) {
            // $resposta = new JsonResponse();

            // return $resposta->setStatusCode(400,'Categoria invalida!');

            return response()->json([
                'erro' => 'Categoria invalida!'
            ], 400);
        } else if ($lutador->peso < 70) {
            $lutador->categoria = "Peso Mosca";
        } else if ($lutador->peso < 80) {
            $lutador->categoria = "Peso leve";
        } else if ($lutador->peso < 90) {
            $lutador->categoria = "Peso Medio";
        } else if ($lutador->peso < 100) {
            $lutador->categoria = "Peso Meio pesado";
        } else if ($lutador->peso >= 100 && $lutador->peso <= 120) {
            $lutador->categoria = "Peso Pesado";
        }

        $lutador->save();

        // return Lutador::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            return Lutador::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json([
                'erro' => 'Lutador nao existe!'
            ], 400);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lutador = Lutador::findOrFail($id);
        $lutador->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lutador = Lutador::findOrFail($id);
        $lutador->delete();
    }
}
