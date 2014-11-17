<?php
use \Model\Twitter;

class Controller_Twitter extends Controller
{
    public function action_index()
    {
        $view  = View::forge('twitter/content');
        $view->set('query', Twitter::get_tweet()->as_array());
        $view->set('title', 'Twitter!!!!!');
        
        return $view;
    }
}
