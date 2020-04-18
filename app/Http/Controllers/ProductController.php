<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    //menyimpan data ke database
    function post(Request $request){
        
        $product =  new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->active = $request->active;
        $product->description = $request->description;

        $product->save();

        return response()->json(
            [
                "message" => "success",
                "data" => $product
            ]
            );
    }

    //get all data from database
    function get(){

        $data = Product::all();
        return response()->json(
            [
                "message" => "success",
                "data" => $data
            ]
            );
    }

    // get data by id 
    function getById($id){

        $data = Product::where('id', $id)->get();
        return response()->json(
            [
                "message" => "success",
                "data" => $data
            ]
            );
    }

    //update data from database by id
    function put($id, Request $request){

        $product = Product::where('id', $id)->first();
        if($product){
        $product->name = $request->name ? $request->name : $product->name;
        $product->price = $request->price ? $request->price : $product->price;
        $product->qty = $request->qty ? $request->qty : $product->qty;
        $product->active = $request->active ? $request->active : $product->active;
        $product->description = $request->description ? $request->description : $product->description;
            
            $product->save();
            
            return response()->json(
                [
                    "message" => "Success ",
                    "data" => $product
                ]
                );    
        }
        return response()->json(
            [
                "message" => "Product ". $id ." Not Found !"
            ],400
            );
    }

    //delete data from db by id
    function delete($id){

        $product = Product::where('id', $id)->first();

        if($product){
            $product->delete();
            return response()->json(
                [
                    "message" => "DELETE product ". $id ." success"
                ]
                );     
        }
        return response()->json(
            [
                "message" => "Product ". $id ." Not Found !"
            ],400
            );
       
    }
}
