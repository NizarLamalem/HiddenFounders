<?php

use Illuminate\Http\Request;

Route::get('nearbyshops', function (Request $request) {
    if (!Auth::check()) {
        //If they are not, we forcefully login the user with id=1
        $user = App\User::find(1);
        Auth::login($user);
    }
    $longitude = floatval($request->input('lang'));
    $latitude = floatval($request->input('lat'));

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
});


Route::get('likeshops', function (Request $request) {
    if (!Auth::check()) {
        //If they are not, we forcefully login the user with id=1
        $user = App\User::find(1);
        Auth::login($user);
    }

    $user = Auth::user();
    $shopID = intval($request->input('ids'));
    $user->shops()->attach($shopID);

});

Route::get('preferredshops', function (Request $request) {
    if (!Auth::check()) {
        //If they are not, we forcefully login the user with id=1
        $user = App\User::find(1);
        Auth::login($user);
    }

    $user = Auth::user();
    return $user->shops;

});



/*
Route::group(['middleware' => "auth"], function () {

    require "shops/shop.routes.php";

});*/


Auth::routes();

