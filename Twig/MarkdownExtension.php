<?php

namespace Soltys\Bundle\SoltysSlateBundle\Twig;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Parsedown;
use Symfony\Component\DomCrawler\Crawler;

/*
 * This file is part of the SoltysSlateBundle.
 *
 * (c) Hugo Soltys <hugo.soltys@gmail.com>
 *
 * https://hugo-soltys.com
 */
class MarkdownExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('markdown', [$this, 'markdownFilter']),
        ];
    }

    public function markdownFilter($pageContent)
    {
        $parser = new Parsedown();
        $md = $parser->text($pageContent);

        return $md;
    }
}