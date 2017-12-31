<?php

namespace App\Http\Controllers;
use App\User ;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function index()
    {

        return view("Shop.index");
    }

    //get nearBy Shops
    public function nearByShops(Request $request)
    {
        /*$request->validate([
             'lang' => 'required',
         'lat' => 'required'
         ]);*/

        $longitude = floatval($request->input('lang'));
        $latitude = floatval($request->input('lat'));
        //dd($request->input('lang')) ;

        return DB::select('SELECT S.id,S.name,S.picture,S.city,
      (3959 * ACOS(COS(RADIANS(' . $longitude . ')) * COS(RADIANS(latitude)) * COS(
        RADIANS(longitude) - RADIANS(' . $latitude . ')
      ) + SIN(RADIANS(' . $longitude . ')) * SIN(RADIANS(latitude))
    )
  ) AS distance
FROM
  locations L, shops S
  WHERE L.id=S.location_id and S.id NOT IN (SELECT shop_id FROM `shop_user` WHERE user_id='.Auth::user()->id.')
  GROUP BY S.id,S.name,S.picture,S.city,distance
HAVING distance
  < 5000
ORDER BY distance');
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
