<?php

class Controller_Child extends Controller_Parent
{
    /**
     http://hostname/public/child/hello
     parent::before!!!
     parent::hello!!!
     */
    public function action_index()
    {
        echo "child::index!!!<br>";
    }
}
