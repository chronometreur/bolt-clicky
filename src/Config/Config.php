<?php

namespace Bolt\Extension\ChronoLabs\Clicky\Config;

/**
 * Class Config
 * @package Bolt\Extension\ChronoLabs\Clicky\Config
 * Config class that holds the configuration of the extension
 */
class Config
{

    private $siteId;

    /**
     * Config constructor.
     * @param $config
     * Setup the configuration from the config array
     */
    public function __construct($config)
    {
        $this->setSiteId($config['site_id']);
    }

    /**
     * @return string
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param string $siteId
     * @return Config
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }
}
