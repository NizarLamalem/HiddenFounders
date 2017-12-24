<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(){

        $shops = Shop::with(["users"=>function($query){
            $query->select('id',"name");
        },"location"])->get();

        return view("Shop.index",compact("shops"));
    }



}
