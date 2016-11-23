<?php

namespace Bolt\Extension\ChronoLabs\Clicky\Provider;

use Bolt\Extension\ChronoLabs\Clicky\Config\Config;
use Bolt\Extension\ChronoLabs\Clicky\Snippet\ClickySnippet;
use Bolt\Filesystem\Handler\DirectoryInterface;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Class ClickyProvider
 * @package Bolt\Extension\ChronoLabs\Clicky\Provider
 */
class ClickyProvider implements ServiceProviderInterface
{

    protected $config;

    /**
     * @var DirectoryInterface
     */
    protected $directory;

    public function __construct($config, DirectoryInterface $directory)
    {
        $this->config = $config;
        $this->directory = $directory;
    }

    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }

    public function register(Application $app)
    {
        $app['clicky.config.config'] = $app->share(
            function () {
                return new Config($this->config);
            }
        );

        /**
         * Snippets service...
         */
        $app['clicky.snippet.clicky'] = $app->share(
            function ($app) {
                return new ClickySnippet(
                    $app['twig'],
                    $app['request_stack'],
                    $app['clicky.config.config']
                );
            }
        );
    }
}
