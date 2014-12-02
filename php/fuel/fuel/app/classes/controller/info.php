<?php

class Controller_Info extends Controller_Rest
{
    # http://***/public/info/prof.json?name=sato&age=20
    public function get_prof()
    {
        $name = Input::get('name');
        $age = Input::get('age');
        $this->response(array(
            'name' => $name,
            'age'  => $age,
        ));
    }
    
    # http://***/public/info/city/tokyo/akasaka.json
    public function get_city($pref, $addr)
    {
        $this->response(array(
            'pref'  => $pref,
            'addr'  => $addr,
        ));
    }
}
