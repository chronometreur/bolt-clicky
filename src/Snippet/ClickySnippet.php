<?php

namespace Bolt\Extension\ChronoLabs\Clicky\Snippet;

use Bolt\Extension\ChronoLabs\Clicky\Config\Config;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig_Environment;

/**
 * Class ClickySnippet
 * @package Bolt\Extension\ChronoLabs\Clicky\Snippet
 * Snippet class to insert Clicky tag on every page
 */
class ClickySnippet
{

    /**
     * @var \Twig_Environment
     */
    protected $view;

    /**
     * @var RequestStack
     */
    protected $request;

    /**
     * @var Config
     */
    protected $config;

    public function __construct(Twig_Environment $view, RequestStack $request, Config $config)
    {
        $this->view = $view;
        $this->request = $request;
        $this->config = $config;
    }

    /**
     * @return string
     * Code snippet to display on every page to keep track of users
     */
    public function insertTag()
    {
        //Set the site id to be used
        $data = [
            'site_id' => $this->config->getSiteId()
        ];

        return $this->view->render("clicky.twig", $data);
    }


}
