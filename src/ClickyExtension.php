<?php

namespace Bolt\Extension\ChronoLabs\Clicky;

use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\Target;
use Bolt\Controller\Zone;
use Bolt\Extension\ChronoLabs\Clicky\Provider\ClickyProvider;
use Bolt\Extension\SimpleExtension;

/**
 * ExtensionName extension class.
 *
 * @author Victor Rodriguez <victor.rodriguez@chrono-labs.com>
 */
class ClickyExtension extends SimpleExtension
{

    /**
     * @return array
     */
    public function getDefaultConfig()
    {
        return array('site_id' => '1000000001');
    }

    /**
     * @return array
     */
    public function getServiceProviders()
    {
        return array($this, new ClickyProvider($this->getConfig(), $this->getBaseDirectory()));
    }

    /**
     * @return array
     */
    public function registerAssets()
    {
        $app = $this->getContainer();
        $tagCode = (new Snippet())
            ->setZone(Zone::FRONTEND)
            ->setLocation(Target::END_OF_BODY)
            ->setCallback([$app['clicky.snippet.clicky'], "insertTag"]);
        $assets = [ $tagCode ];
        return $assets;
    }

    /**
     * @return array
     */
    protected function registerTwigPaths()
    {
        return array('templates');
    }
}
