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

Route::get('/2', function () {

    interface CarService {

        public function getCost();

        public function getDescription();
    }

    class BasicInspetion implements CarService {

        public function getCost()
        {
            return 25;
        }

        public function getDescription()
        {
            return 'Basic inspection';
        }
    }

    class OilChange implements CarService {

        protected $carService;

        function __construct(CarService $carService)
        {
            $this->carService = $carService;
        }

        public function getCost()
        {
            return $this->carService->getCost() + 20;
        }

        public function getDescription()
        {
            return $this->carService->getDescription() . ', and oil change';
        }
    }

    class TireRotation implements CarService {

        protected $carService;

        function __construct(CarService $carService)
        {
            $this->carService = $carService;
        }

        public function getCost()
        {
            return $this->carService->getCost() + 30;
        }

        public function getDescription()
        {
            return $this->carService->getDescription() . ', and tire rotation';
        }
    }

    $carService = (new TireRotation(new OilChange(new BasicInspetion)));

    echo $carService->getDescription() . ': $' .  $carService->getCost();

    // Nesse caso nao precisamos alterar manualmente o valor os valores,
    // se altera em um, todas as dependencias vao trabalhar com esse novo valor,
    // isso é oque um decorator deve fazer
});
