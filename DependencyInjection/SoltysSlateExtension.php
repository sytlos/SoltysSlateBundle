<?php

namespace Soltys\Bundle\SoltysSlateBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

/*
 * This file is part of the SoltysSlateBundle.
 *
 * (c) Hugo Soltys <hugo.soltys@gmail.com>
 *
 * https://hugo-soltys.com
 */
class SoltysSlateExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('soltys_slate.title', $config['title']);
        $container->setParameter('soltys_slate.navbar_path', $config['navbar_path']);
        $container->setParameter('soltys_slate.logo_path', $config['logo_path']);
        $container->setParameter('soltys_slate.with_search', $config['with_search']);
        $container->setParameter('soltys_slate.page_classes', $config['page_classes']);
        $container->setParameter('soltys_slate.language_tabs', $config['language_tabs']);
        $container->setParameter('soltys_slate.includes', $config['includes']);
        $container->setParameter('soltys_slate.toc_footers', $config['toc_footers']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
