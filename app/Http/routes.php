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

    abstract class HomeChecker {

        protected $successor;

        abstract public function check(HomeStatus $home);

        public function setSuccessor(HomeChecker $successor) {
            $this->successor = $successor;
        }

        public function next(HomeStatus $home)
        {
            if ($this->successor) {
                $this->successor->check($home);
            }
        }
    }

    class Locks extends HomeChecker {

        public function check(HomeStatus $home)
        {
            if (! $home->locked) {
                throw new Exception('The doors are open');
            }

            $this->next($home);
        }
    }

    class Lights extends HomeChecker {

        public function check(HomeStatus $home)
        {
            if (! $home->lightsOff) {
                throw new Exception('The lights are on');
            }

            $this->next($home);
        }
    }

    class Alarms extends HomeChecker {

        public function check(HomeStatus $home)
        {
            if (! $home->alarmOn) {
                throw new Exception('The alarm is off');
            }

            $this->next($home);
        }
    }

    class HomeStatus {
        public $alarmOn = true;
        public $lightsOff = true;
        public $locked = false;
    }

    $lights = new Lights;
    $locks = new Locks;
    $alarms = new Alarms;

    $lights->setSuccessor($locks);
    $locks->setSuccessor($alarms);

    $lights->check(new HomeStatus);

    echo 'no problem';
});
