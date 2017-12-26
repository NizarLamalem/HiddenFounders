<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {

        return view("Shop.index");
    }

    //get nearBy Shops
    public function nearByShops()
    {

    }

    //get preferred Shops
    public function preferredShops()
    {

    }

    //like a shop
    public function likeShops($request)
    {
    }

    //edit a shop
    public function dislikeShops()
    {

    }

    //remeve a shop from preferred
    public function deleteShops()
    {
    }
}
