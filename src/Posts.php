<?php


namespace Example;


use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Posts
{

    /**
     * @var \WP_Query
     */
    protected $WP_Query;
    /**
     * @var OptionsResolver
     */
    protected $optionsResolver;

    /**
     * PopularPosts constructor.
     * @param \WP_Query $WP_Query
     */
    public function __construct( \WP_Query $WP_Query )
    {
        $this->WP_Query = $WP_Query;
        $this->optionsResolver = new OptionsResolver();
        $this->initOptions();
    }

    /**
     * Init options resolver
     */
    abstract protected function initOptions();

    /**
     * Do query with set args
     *
     * @return $this
     */
    public function doQuery()
    {
        $this->WP_Query->query( $this->getArgs() );
        return $this;
    }

    /**
     * @return \WP_Query
     */
    public function getQuery()
    {
        return $this->WP_Query;
    }

    /**
     * Get args
     *
     * @return array
     */
    protected function getArgs()
    {
        //Get the args used when creating the WP_Query object
        $args = $this->getQuery()->query;
        //If no args passed then create an empty array so the error is meaningful
        if (!is_array($args)) {
            $args = [];
        }

        return $this->optionsResolver->resolve($args);
    }

}