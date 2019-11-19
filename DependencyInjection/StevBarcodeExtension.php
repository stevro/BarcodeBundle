<?php

/*
 * This code belongs to NIMA Software SRL | nimasoftware.com
 * For details contact contact@nimasoftware.com
 */

namespace Intima\CommonBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * Description of IntimaCommonExtension
 *
 * @author stefan
 */
class IntimaCommonExtension extends Extension implements \Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface
{

    public function prepend(ContainerBuilder $container)
    {
        // get all bundles
        $bundles = $container->getParameter('kernel.bundles');

        // process the configuration of AcmeHelloExtension
        $configs = $container->getExtensionConfig($this->getAlias());

        // use the Configuration class to generate a config array with
        $config = $this->processConfiguration(new \Sensio\Bundle\FrameworkExtraBundle\DependencyInjection\Configuration(),
            $configs);
    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new \Symfony\Component\DependencyInjection\Loader\YamlFileLoader($container,
            new \Symfony\Component\Config\FileLocator(__DIR__.'/../Resources/config'));

        $loader->load('services.yaml');
    }

}
