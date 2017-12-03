<?php

namespace Soltys\Bundle\SoltysSlateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SlateController extends Controller
{
    public function indexAction()
    {
        $pageContent = $this->renderView('doc/index.md.twig');

        $config = [
            'title' => 'Slate Symfony Bundle',
            'navbar' => 'bundles/app/images/navbar.png',
            'logo' => 'bundles/app/images/logo.png',
            'includes' => [
                ':doc/includes:_errors.md.twig'
            ],
            'language_tabs' => [
                'shell',
                'ruby',
                'python',
                'javascript'
            ],
            'with_search' => 1,
            'toc_footers' => [
                ':doc/footers:_footer.html.twig'
            ],
            'page_classes' => 'index'
        ];

        foreach ($config as $key => $conf) {
            if ($key == 'includes' && $conf) {
                foreach ($conf as $include) {
                    $pageContent .= $this->renderView($include);
                }
            }
        }

        return $this->render('doc/index.html.twig', [
            'page_content' => $pageContent,
            'config' => $config
        ]);
    }
}
