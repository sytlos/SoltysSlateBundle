<?php

namespace Soltys\Bundle\SoltysSlateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author hugosoltys
 *
 * This is the class that validates and merges configuration from your app/config files
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('soltys_slate');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('title')
                    ->defaultValue('API Documentation')
                ->end()
                ->scalarNode('navbar_path')
                    ->defaultValue('bundles/soltysslate/images/navbar.png')
                ->end()
                ->scalarNode('logo_path')
                    ->defaultValue('bundles/soltysslate/images/navbar.png')
                ->end()
                ->scalarNode('with_search')
                    ->defaultValue(true)
                ->end()
                ->scalarNode('page_classes')
                    ->defaultValue('index')
                ->end()
                ->arrayNode('language_tabs')
                    ->prototype('scalar')->end()
                ->end()
                ->arrayNode('includes')
                    ->prototype('scalar')->end()
                ->end()
                ->arrayNode('toc_footers')
                    ->prototype('scalar')->end()
                ->end()
            ->end();


        return $treeBuilder;
    }
}
