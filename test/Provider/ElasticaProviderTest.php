<?php

namespace Basster\Cilex\Elastica\Test\Provider;

use Basster\Cilex\Elastica\Provider\ElasticaProvider;
use Cilex\Application;

class ElasticaProviderTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Application */
    private $app;

    public function testRegisterClient()
    {
        $provider = new ElasticaProvider;
        $provider->register($this->app);

        self::assertArrayHasKey('elastica', $this->app);
        self::assertInstanceOf('Elastica\Client', $this->app['elastica']);
    }

    public function testRegisterClientWithPrefix()
    {
        $prefix = 'foobar';
        $provider = new ElasticaProvider($prefix);
        $provider->register($this->app);

        self::assertArrayHasKey($prefix, $this->app);
    }

    public function testRegisterClientOptions()
    {
        $provider = new ElasticaProvider;
        $provider->register($this->app);

        self::assertArrayHasKey('elastica.client_options', $this->app);
    }

    protected function setUp()
    {
        $this->app = new Application('basster/elastica');
    }
}
