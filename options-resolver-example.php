<?php
/**
 Plugin Name: Options Resolver Example
 Author: Josh Pollock
 */
include_once __DIR__ . '/vendor/autoload.php';

add_action( 'init', function(){
   $author = new \Example\AuthorPosts( new WP_Query( [ 'author' => 2 ] ) );
   $posts = $author->doQuery()->getQuery()->get_posts();
   $x= 1;
});