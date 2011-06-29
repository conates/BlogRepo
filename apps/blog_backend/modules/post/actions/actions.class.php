<?php

require_once dirname(__FILE__) . '/../lib/postGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/postGeneratorHelper.class.php';

/**
 * post actions.
 *
 * @package    shimano
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postActions extends autoPostActions {

    public function executeIndex(sfWebRequest $request) {
        // searching
        if ($request->hasParameter('search')) {
            $this->setSearch($request->getParameter('search'));
            $request->setParameter('page', 1);
        }

        // filtering
        if (!$request->getParameter('filters') && $request->getParameter('state') == 'null') {
            $this->setFilters(array());
        } elseif ($request->getParameter('state') == 'dr') {
            $this->setFilters(array());
            $this->setFilters(array('state' => 'Borrador'));
        } elseif ($request->getParameter('state') == 'pu') {
            $this->setFilters(array());
            $this->setFilters(array('state' => 'Publicado'));
        } elseif ($request->getParameter('state') == 'pe') {
            $this->setFilters(array());
            $this->setFilters(array('state' => 'Pendiente'));
        } elseif ($request->getParameter('filters')) {
            $this->setFilters($request->getParameter('filters'));
        }

        if ($this->getUser()->hasCredential(array('Autor')) || $this->getUser()->hasCredential(array('Colaborador')))
            $this->setFilters(array('user_id' => sfContext::getInstance()->getUser()->getGuardUser()->getId()));


        // sorting
        if ($request->getParameter('sort')) {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        //maxPerPage
        if ($request->getParameter('maxPerPage')) {
            $this->setMaxPerPage($request->getParameter('maxPerPage'));
            $this->setPage(1);
        }


        // pager
        if ($request->getParameter('page')) {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();

        if ($request->isXmlHttpRequest()) {
            $partialFilter = null;
            sfConfig::set('sf_web_debug', false);
            $this->setLayout(false);
            sfProjectConfiguration::getActive()->loadHelpers(array('I18N', 'Date'));

            if ($request->hasParameter('search')) {
                $partialSearch = $this->getPartial('post/search', array('configuration' => $this->configuration));
            }

            if ($request->hasParameter('_reset')) {
                $partialFilter = $this->getPartial('post/filters', array('form' => $this->filters, 'configuration' => $this->configuration));
            }

            $partialList = $this->getPartial('post/list', array('pager' => $this->pager, 'sort' => $this->sort, 'helper' => $this->helper));

            if (isset($partialSearch)) {
                $partialList .= '#__filter__#' . $partialSearch;
            }
            if (isset($partialFilter)) {
                $partialList .= '#__filter__#' . $partialFilter;
            }
            return $this->renderText($partialList);
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $q = Doctrine::getTable('Post')->findByUserIdAndId(sfContext::getInstance()->getUser()->getGuardUser()->getId(), $request->getParameter('id'));

        if ($q->count() <> 0 || $this->getUser()->hasCredential(array('Editor')) || $this->getUser()->hasCredential(array('Administrador'))) {

            $this->post = $this->getRoute()->getObject();
            $this->form = $this->configuration->getForm($this->post);
        } else {
            $this->redirect('@sf_guard_500');
        }
    }

}
