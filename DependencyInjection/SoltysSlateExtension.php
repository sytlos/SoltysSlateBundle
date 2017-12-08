<?php

namespace Soltys\Bundle\SoltysSlateBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/*
 * This file is part of the SoltysSlateBundle.
 *
 * (c) Hugo Soltys <hugo.soltys@gmail.com>
 *
 * https://hugo-soltys.com
 */
class SoltysSlateExtension extends Extension implements PrependExtensionInterface
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

    /**
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        $config = [
            'parser' => [
                'service' => 'markdown.parser.sundown'
            ],
            'sundown' => [
                'extensions' => [
                    'fenced_code_blocks' => true,
                    'no_intra_emphasis' => true,
                    'tables' => true,
                    'autolink' => true,
                    'strikethrough' => true,
                    'lax_html_blocks' => true,
                    'space_after_headers' => true,
                    'superscript' => true
                ],
                'render_flags' => [
                    'filter_html' => true,
                    'no_images' => true,
                    'no_links' => true,
                    'no_styles' => true,
                    'safe_links_only' => true,
                    'with_toc_data' => true,
                    'hard_wrap' => true,
                    'xhtml' => true
                ]
            ]
        ];

        $container->prependExtensionConfig('knp_markdown', $config);
    }
}
