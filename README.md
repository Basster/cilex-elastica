# basster/cilex-elastica

[![Build Status](https://travis-ci.org/Basster/cilex-elastica.svg?branch=master)](https://travis-ci.org/Basster/cilex-elastica) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/d157422c-912c-4015-ac30-3b989181378f/mini.png)](https://insight.sensiolabs.com/projects/d157422c-912c-4015-ac30-3b989181378f)

This is a service provider for [Cilex](http://cilex.github.io/) which makes
access to [Elasticsearch](http://www.elasticsearch.org) available through
[Elastica](http://elastica.io).

This library is a Cilex adaptation of [easybib/silex-elastica](https://github.com/easybiblabs/silex-elastica).

## Getting Started

Set up the dependency on this package using [Composer](http://packagist.org/about-composer).
Once you have a Silex application skeleton you can register the service provider
and set Elastica options:

```php
$app->register(new Basster\Cilex\Elastica\Provider\ElasticaProvider(), [
    'elastica.client_options' => [
        'host' => 'localhost',
        'port' => 9200,
    ],
]);
```

The full set of options is available on the [Elastica documentation](http://elastica.io).

## License ##

The code is available under the [MIT](LICENSE) license.
