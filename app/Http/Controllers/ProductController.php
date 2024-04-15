<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        Log::info("Llegamos al index de products");
        $products = Products::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        Log::info("Resquest --> " . $request);
        $product = new Products;
        $product->nombre = $request->nombre;
        $product->precio = $request->precio;
        $product->save();
        return response()->json(["message" => "Producto Agregado"], 201);

    }

    public function show($id)
    {
        Log::info("Buscando" . $id);
        $product = Products::find($id);
        if (!empty($product)) {
            return response()->json($product);
        } else {
            return response()->json(["message" => "Producto no encontrado"], 404);
        }
    }


    public function destroy($id)
    {
        Log::info("vamos a eliminar[" . $id . "]");

        if (Products::where('id', $id)->exists()) {
            $product = Products::find($id);
            $product->delete();

            return response()->json(['message' => 'Registro Eliminado'], 202);
        } else {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }


    }



    public function update(Request $request, $id)  {
        Log::info('Vamos a actualizar'. $id . '');

        if(Products::where('id', $id)->exists()) {
            $product = Products::find($id);
            $product->nombre = is_null($request->nombre) ?  $product->nombre  : $request->nombre;
            $product->precio = is_null($request->precio) ?  $product->precio  : $request->precio;
            $product->save();
            return response()->json(['message'=> 'Registro Actualizado'], 200);
        }else{
            return response()->json(['message'=> 'Producto no encontrado'], 404);
        }
    }
}
