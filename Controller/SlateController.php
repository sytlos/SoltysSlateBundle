<?php

namespace Soltys\Bundle\SoltysSlateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/*
 * This file is part of the SoltysSlateBundle.
 *
 * (c) Hugo Soltys <hugo.soltys@gmail.com>
 *
 * https://hugo-soltys.com
 */
class SlateController extends Controller
{
    public function indexAction()
    {
        $pageContent = $this->renderView('SoltysSlateBundle:Slate/MarkDown:index.md.twig');

        $title = $this->getParameter('soltys_slate.title');
        $navbarPath = $this->getParameter('soltys_slate.navbar_path');
        $logoPath = $this->getParameter('soltys_slate.logo_path');
        $withSearch = $this->getParameter('soltys_slate.with_search');
        $pageClasses = $this->getParameter('soltys_slate.page_classes');
        $languageTabs = $this->getParameter('soltys_slate.language_tabs');
        $includes = $this->getParameter('soltys_slate.includes');
        $tocFooters = $this->getParameter('soltys_slate.toc_footers');

        /*$config = [
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
        ];*/

        foreach ($includes as $include) {
            $pageContent .= $this->renderView($include);
        }

        return $this->render('SoltysSlateBundle:Slate:index.html.twig', [
            'page_content' => $pageContent,
            'title' => $title,
            'navbarPath' => $navbarPath,
            'logoPath' => $logoPath,
            'withSearch' => $withSearch,
            'pageClasses' => $pageClasses,
            'languageTabs' => $languageTabs,
            'includes' => $includes,
            'tocFooters' => $tocFooters
        ]);
    }
}
