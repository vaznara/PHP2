<?php

namespace App\services\renderers;

class TwigRender
{

    public $loader;
    public $twig;
    public $templatesPath;
    public $layoutTemplates;

    public function __construct()
    {
        $this->templatesPath = dirname(dirname(__DIR__)) . '/views';
        $this->layoutTemplates = dirname(dirname(__DIR__)) . '/views/layouts';
        $this->loader = new \Twig\Loader\FilesystemLoader($this->templatesPath);
        $this->twig = new \Twig\Environment($this->loader, []);
//        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }

    public function render($templateName, $params = [])
    {
        return $this->twig->render($templateName . '.twig', $params);
    }
}