<?php
/*
Plugin Name: Movie Review
Plugin URI:
Description: Criação de um plugin para administração de um cinema
Version: 1.0
Author: Vinícius Pereira de Oliveira
Author URI:
Text Domain: movie_reviews
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
        add_action('init', 'Movie::registerPostType');
    }

    public static function registerPostType()
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

    public static function activate()
    {
        self::registerPostType();
        flush_rewrite_rules();
    }
}

Movie::getInstance();

register_deactivation_hook(__FILE__,"flush_rewrite_rules");
register_activation_hook(__FILE__,"Movie::activate");