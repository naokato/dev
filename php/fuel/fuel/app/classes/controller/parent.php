<?php

class Controller_Parent extends Controller
{
    public function before()
    {
        echo "parent::before!!!<br>";

    }

    public function action_index()
    {
        echo "parent::index!!!<br>";
    }
    
    public function action_hello()
    {
        echo "parent::hello!!!<br>";
    }
    
}
