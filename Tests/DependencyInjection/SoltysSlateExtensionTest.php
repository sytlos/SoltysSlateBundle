<?php

namespace Soltys\Bundle\SoltysSlateBundle\Test;

use Soltys\Bundle\SoltysSlateBundle\DependencyInjection\SoltysSlateExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SoltysSlateExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testInvalidTitleThrowsException()
    {
        $container = new ContainerBuilder();

        $config = ['title' => ['Test title']];

        $extension = new SoltysSlateExtension();
        $extension->load($config, $container);

        $this->expectException('InvalidTypeException');
    }

    public function testInvalidNavbarPathThrowsException()
    {
        $container = new ContainerBuilder();

        $config = ['navbar_path' => ['Test navbar_path']];

        $extension = new SoltysSlateExtension();
        $extension->load($config, $container);

        $this->expectException('InvalidTypeException');
    }
}