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
