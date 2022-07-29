<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class mycontroller extends Controller
{
    //add Product
    function insert(Request $req)
    {
        $name = $req->get('pname');
        $price = $req->get('pprice');
        // dd($req);
        $pimage = $req->file('image')->getClientOriginalName();
        //??move upload filess
        $req->image->move(public_path('images'), $pimage);
        // return $req->input();
        $prod = new product();
        $prod->PName = $name;
        $prod->PPrice = $price;
        $prod->PImage = $pimage;
        $prod->save();
        return redirect('/');
    }
    //Get all
    function readdata()
    {
        $pdata = product::all();
        return view('insertRead', ['data' => $pdata]);
    }
    //Update or delete
    function updatedelete($id)
    {
        $product = product::find($id);
        return view('uploadview', ['product' =>  $product]);
    }

    function editproduct(Request $req, $id)
    {
        $prod = product::find($id);
        $input = $req->all();
        if (is_null($req->file('image'))) {
            $prod->PImage = $prod['PImage'];
        } else {
            $pimage = $req->file('image')->getClientOriginalName();
            //??move upload filess
            $req->image->move(public_path('images'), $pimage);
            $prod->PImage = $pimage;
        }
        $prod->PName = $input['name'];
        $prod->PPrice = $input['price'];
        $prod->save();
        return redirect('/');
    }
    function deleleproduct($id)
    {
        $prod = product::find($id);
        $prod->delete();
        return redirect('/');
    }
}
