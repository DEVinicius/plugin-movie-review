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
        //Ao iniciar ele já realiza essa ação
        add_action('init', array($this,'registerPostType'));
    }

    function registerPostType()
    {
        register_post_type("Movie", array(
            "labels" => array(
                "name" => "Movie Review",
                "singular_name" => "Movie"
            ),
            "description" => "Post to insert reviews",
            "supports" => array(
                "title",
                "editor",
                "comments",
                "revisions",
                "author",
                "thumbnail",
                "custom-fields"
            ),
            "public" => TRUE,
            "menu_position" => 4
        ));
    }
}

Movie::getInstance();

register_deactivation_hook(__FILE__,"");
register_activation_hook(__FILE__,"");