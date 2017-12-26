<?php
//home page
Route::get("/", "ShopController@index");
Route::get("home", "ShopController@index");
//get nearby Shops
Route::get("shops", "ShopController@nearByShops");
//get preferred Shops
Route::get("shops", "ShopController@preferredShops");
//like a Shop
Route::post("shops", "ShopController@likeShops");
//dislike Shop
Route::post("shops", "ShopController@dislikeShops");
//dislike Shop
Route::get("shops", "ShopController@deleteShops");






