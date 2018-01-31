<?php


namespace Example;


/**
 * Class PopularPosts
 *
 * Get popular posts
 *
 * @package Example
 */
class PopularPosts extends Posts
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
        ]);

        //Add post_type as a required arg with no default
        $this->optionsResolver->setDefined( 'post_type' );
        $this->optionsResolver->setRequired( 'post_type' );

    }


}