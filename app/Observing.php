<?php

interface Subject {
    public function attach($observer);
    public function attachObservers($observable);
    public function detach($observer);
    public function notify();
    public function fire();
}

interface Observer {
    public function handle();
}

class Login implements Subject {

    protected $observers = [];

    public function attach($observable)
    {
        if (is_array($observable)) {
            return $this->attachObservers($observable);
        }
        $this->observers[] = $observable;

        return $this;
    }

    public function attachObservers($observable)
    {
        foreach ($observable as $observer) {
            if (! $observer instanceof Observer) {
                throw new Exception;
            }
            $this->attach($observer);
        }

        return;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->handle();
        }
    }

    public function fire()
    {
        $this->notify();
    }
}

class LogHandler implements Observer {

    public function handle()
    {
        var_dump('log de algo important');
    }
}

class EmailNotify implements Observer {

    public function handle()
    {
        var_dump('email notify');
    }
}

$login = new Login;

$login->attach([
    new LogHandler,
    new EmailNotify
]);

$login->fire();
