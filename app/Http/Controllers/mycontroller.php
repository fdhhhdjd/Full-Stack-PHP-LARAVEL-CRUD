<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class mycontroller extends Controller
{
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

    function readdata()
    {
        $pdata = product::all();
        return view('insertRead', ['data' => $pdata]);
    }
}
