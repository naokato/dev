<?php

class Controller_Info extends Controller_Rest
{
    public function get_prof()
    {
        $name = Input::get('name');
        $age = Input::get('age');
        $this->response(array(
            'name' => $name,
            'age'  => $age,
        ));
    }
}
