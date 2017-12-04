<?php

namespace Soltys\Bundle\SoltysSlateBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author hugosoltys
 *
 * This is the class that loads and manages your bundle configuration
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
    }
}
