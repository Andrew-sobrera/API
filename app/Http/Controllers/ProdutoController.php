<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdutoResource;
use Illuminate\Http\Request;
use App\Models\Produto;
use GuzzleHttp\Psr7\Response;
use Illuminate\Mail\Mailables\Content;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::paginate();
        return ProdutoResource::collection($produtos);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $produto = Produto::create($data);

        return new ProdutoResource($produto);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);
         return new ProdutoResource($produto);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $produto = Produto::findOrFail($id);

        $produto->update($data);

        return new ProdutoResource($produto);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::findOrFail($id)->delete();

    }
}
