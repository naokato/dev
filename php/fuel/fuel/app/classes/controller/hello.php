<?php

class Controller_Hello extends Controller
{
    public function action_index()
    {
        return View::forge('hello');
    }
}
