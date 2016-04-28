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

    interface BookInterface {

        public function open();

        public function turnPage();
    }

    class Book implements BookInterface {

        public function open()
        {
            var_dump('opening the papper book');
        }

        public function turnPage()
        {
            var_dump('turning the page of the papper book');
        }
    }


    interface eReaderInterface {

        public function turnOn();

        public function pressNextButton();
    }

    class Kindle implements eReaderInterface{

        public function turnOn()
        {
            var_dump('turn the kindle on');
        }

        public function pressNextButton()
        {
            var_dump('press next button on the kindle');
        }
    }

    class Nook implements eReaderInterface{

        public function turnOn()
        {
            var_dump('turn the Nook on');
        }

        public function pressNextButton()
        {
            var_dump('press next button on the Nook');
        }
    }


    class eReaderAdapter implements BookInterface{

        protected $reader;

        function __construct(eReaderInterface $reader)
        {
            $this->reader = $reader;
        }

        public function open()
        {
            return $this->reader->turnOn();
        }

        public function turnPage()
        {
            return $this->reader->pressNextButton();
        }
    }


    class Person {

        public function read($book)
        {
            $book->open();
            $book->turnPage();
        }
    }

    (new Person)->read(new Book);
    echo '<br>';
    (new Person)->read(new eReaderAdapter(new Nook));
    echo '<br>';
    (new Person)->read(new eReaderAdapter(new Kindle));
});
