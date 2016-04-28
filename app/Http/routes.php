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

// Pattern
Route::get('/1', function () {

    interface Logger {
        public function log($data);
    }

    class LogToFile implements Logger {

        public function log($data)
        {
            var_dump('log to file');
        }
    }

    class LogToDatabase implements Logger {

        public function log($data)
        {
            var_dump('log to database');
        }
    }

    class LogToXWebService implements Logger {

        public function log($data)
        {
            var_dump('log to XWebService');
        }
    }

    class App {

        public function log($data, Logger $logger = null)
        {
            $logger = $logger ?: new LogToFile;
            $logger->log($data);
        }
    }

    $app = new App;
    $app->log('testew', new LogToXWebService);
});
