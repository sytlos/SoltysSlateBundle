<?php

namespace Soltys\Bundle\SoltysSlateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/*
 * This file is part of the SoltysSlateBundle.
 *
 * (c) Hugo Soltys <hugo.soltys@gmail.com>
 *
 * https://hugo-soltys.com
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
                    ->defaultValue('bundles/soltysslate/images/logo.png')
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
