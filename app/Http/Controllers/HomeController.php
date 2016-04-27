<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Events\Dispatcher;

class HomeController extends Controller
{
    public function getIndex(Dispatcher $dispatcher)
    {
        $dispatcher->fire('UserHasLoggedIn');
    }
}
