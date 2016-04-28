<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/1', function () {

    class BasicInspetion {
        public function getCost()
        {
            return 25;
        }
    }

    class BasicInspetionAndOilChange {
        public function getCost()
        {
            return 25 + 19;
        }
    }

    class BasicInspetionAndOilChangeAndTireRotation {
        public function getCost()
        {
            return 25 + 19 + 19;
        }
    }

    echo (new BasicInspetionAndOilChangeAndTireRotation)->getCost();
});
