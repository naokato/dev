<?php
namespace Model;
use \DB;

class Twitter extends \Model
{
    public static function get_tweet()
    {
        return DB::select()->from('tweet')->execute();
    }
}
