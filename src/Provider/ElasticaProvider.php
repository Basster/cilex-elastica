<?php

namespace Basster\Cilex\Elastica\Provider;

use Cilex\Application;
use Cilex\ServiceProviderInterface;
use Elastica\Client;

/**
 * Exposes an Elastica client through Pimple to Cilex
 */
class ElasticaProvider implements ServiceProviderInterface
{
    /** @var string */
    protected $prefix;

    /**
     * Creates the service provider with a prefix name
     *
     * @param string $prefix All pimple keys will be prefixed with this
     */
    public function __construct($prefix = 'elastica')
    {
        $this->prefix = $prefix;
    }

    /**
     * {@inheritDoc}
     */
    public function register(Application $app)
    {
        $prefix = $this->prefix;
        if (!isset($app["$prefix.client_options"])) {
            $app["$prefix.client_options"] = [];
        }
        $app["$prefix"] = $app->share(function () use ($app, $prefix) {
            return new Client($app["$prefix.client_options"]);
        });
    }
}
