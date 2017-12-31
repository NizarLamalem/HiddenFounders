<?php
//home page
Route::get("/", "ShopController@index");
Route::get("home", "ShopController@index");
//get nearby Shops
Route::get("nearbyshops", "ShopController@nearByShops");
//get preferred Shops
Route::get("preferredshops", "ShopController@preferredShops");
//like a Shop
Route::post("likeshops", "ShopController@likeShops");
//dislike Shop
Route::post("dislikeshops", "ShopController@dislikeShops");
//dislike Shop
Route::get("deleteShops", "ShopController@deleteShops");






