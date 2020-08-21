<?php
/*
Plugin Name: Movie Review
Plugin URI:
Description: Criação de um plugin para administração de um cinema
Version: 1.0
Author: Vinícius Pereira de Oliveira
Author URI:
Text Domain:
License:
*/

class Movie
{
    //class Singleton
    private static $instance;

    public static function getInstance()
    {
        if(self::$instance == NULL)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {

    }
}

Movie::getInstance();