<?php


namespace Example;


use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Posts
{

    /**
     * @var array
     */
    protected $args;

    /**
     * @var OptionsResolver
     */
    protected $optionsResolver;

    /**
     * PopularPosts constructor.
     * @param array $args Optional. WP_Query arguments
     */
    public function __construct( array $args = []  )
    {
        $this->args = $args;
        $this->optionsResolver = new OptionsResolver();
        $this->initOptions();
    }

    /**
     * Init options resolver
     */
    abstract protected function initOptions();


    /**
     * Get query
     *
     * Causes query to run and args to be parsed
     *
     * @return \WP_Query
     */
    public function getQuery()
    {
        return new \WP_Query( $this->args );
    }

    /**
     * Get args
     *
     * @return array
     */
    protected function getArgs()
    {
        return $this->optionsResolver->resolve($this->args);
    }

}