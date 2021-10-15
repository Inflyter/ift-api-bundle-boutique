<?php
namespace Inflyter\BoutiqueBundle\DependencyInjection;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

//class name is important!
class InflyterBoutiqueExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {//dump('We\'re alive!');die;
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
