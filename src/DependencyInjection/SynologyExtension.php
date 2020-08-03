<?php

namespace DM\SynologyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SynologyExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container) ?? new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('dm_synology.synology');
        $definition->setArgument('$user', $config['dsm_app_id']);
        $definition->setArgument('$password', $config['dsm_app_password']);
        $definition->setArgument('$url', $config['dsm_app_url']);
    }
}
