<?php

namespace App;

use Illuminate\Contracts\Container\Container;

abstract class ContainerAwareCommand extends Command
{
    /**
     * Container instance.
     *
     * @var Container
     */
    private $container;

    /**
     * ContainerAwareCommand constructor.
     *
     * @param  Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container);

        parent::__construct();
    }

    /**
     * Sets the internal container instance.
     *
     * @param  Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Returns the container.
     *
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Re-routes calls to the container.
     *
     * @param  string $method
     * @param  array $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        $container = $this->getContainer();

        if (is_callable([$container, $method])) {
            return $container->$method(...$args);
        }
    }
}
