<?php

Route::group(['middleware' => "auth"], function () {

    require "shops/shop.routes.php";

});


Auth::routes();

