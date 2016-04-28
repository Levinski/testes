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

// No-pattern
Route::get('/1', function () {

    abstract class VeganSub {

        public function make()
        {
            return $this
                ->layBread()
                ->addVegetables()
                ->addSoja();
        }

        public function layBread()
        {
            var_dump('laying down the bread');

            return $this;
        }

        public function addVegetables()
        {
            var_dump('add some vegetables');

            return $this;
        }

        public function addSoja()
        {
            var_dump('add some soja');

            return $this;
        }
    }

    class CheeseSub {

        public function make()
        {
            return $this
                ->layBread()
                ->addCheese()
                ->addSoja();
        }

        public function layBread()
        {
            var_dump('laying down the bread');

            return $this;
        }

        public function addCheese()
        {
            var_dump('add some cheese');

            return $this;
        }

        public function addSoja()
        {
            var_dump('add some soja');

            return $this;
        }
    }


    (new CheeseSub)->make();
    echo '<br>';
    (new VeganSub)->make();
});

// Pattern
Route::get('/2', function () {

    abstract class AbstractSub {

        public function make()
        {
            return $this
                ->layBread()
                ->additional()
                ->addSoja();
        }

        protected function layBread()
        {
            var_dump('laying down the bread');

            return $this;
        }

        protected function addSoja()
        {
            var_dump('add some soja');

            return $this;
        }

        protected abstract function additional();
    }

    class VeganSub extends AbstractSub {

        public function additional()
        {
            var_dump('add some vegetables');

            return $this;
        }
    }

    class CheeseSub extends AbstractSub {

        public function additional()
        {
            var_dump('add some cheese');

            return $this;
        }
    }


    (new CheeseSub)->make();
    echo '<br>';
    (new VeganSub)->make();
});
