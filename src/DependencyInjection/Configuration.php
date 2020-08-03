<?php

namespace DM\SynologyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('synology');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->children()
            ->variableNode('dsm_app_url')->end()
            ->variableNode('dsm_app_id')->end()
            ->variableNode('dsm_app_password')->end()
        ->end();

        return $treeBuilder;
    }
}
