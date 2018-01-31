<?php


namespace Example;

/**
 * Class AuthorPosts
 *
 * Get posts by author
 *
 * @package Example
 */
class AuthorPosts extends Posts
{

    /**
     * Init options resolver
     */
    protected function initOptions()
    {

        //Add default, non-required args
        $this->optionsResolver->setDefaults([
            'orderby' => 'comment_count',
            'page' => 1,
            'posts_per_page' => 15,
            'post_type' => 'post'
        ]);

        //Make author a required option with no default
        $this->optionsResolver->setDefined( 'author' );
        $this->optionsResolver->setRequired( 'author' );
        //Require author argument to be an integer
        $this->optionsResolver->setAllowedTypes( 'author', array(
            'integer'
        ));
        //Force post type to be a string -- IE one post type only
        $this->optionsResolver->setAllowedTypes('post_type', 'string');
        //Force post type to be "post" or "article"
        $this->optionsResolver->setAllowedValues('post_type', [
            'post',
            'article'
        ]);
    }

}