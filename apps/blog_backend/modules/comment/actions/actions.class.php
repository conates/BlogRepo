<?php

require_once dirname(__FILE__) . '/../lib/commentGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/commentGeneratorHelper.class.php';

/**
 * comment actions.
 *
 * @package    shimano
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commentActions extends autoCommentActions {

    public function executeIndex(sfWebRequest $request) {
        // searching
        if ($request->hasParameter('search')) {
            $this->setSearch($request->getParameter('search'));
            $request->setParameter('page', 1);
        }

        // filtering
        if (!$request->getParameter('filters') && $request->getParameter('state') == 'null') {
            $this->setFilters(array());
        } elseif ($request->getParameter('state') == 'pe') {
            $this->setFilters(array());
            $this->setFilters(array('state' => 'Pendiente'));
        } elseif ($request->getParameter('state') == 'pu') {
            $this->setFilters(array());
            $this->setFilters(array('state' => 'Publicado'));
        } elseif ($request->getParameter('state') == 'now') {
            $this->setFilters(array());
            $this->setFilters(array('created_at' => array('from' => date('Y-m-d 00:00:00'), 'to' => date('Y-m-d 23:59:59'))));
        } elseif ($request->getParameter('post_id')) {
            $this->setFilters(array());
            $this->setFilters(array('post_id' => $request->getParameter('post_id')));
        } elseif ($request->getParameter('filters')) {
            $this->setFilters($request->getParameter('filters'));
        }

        if($this->getUser()->hasCredential(array( 'Autor','Colaborador' ),false))
          $this->setFilters(array('user_id' => sfContext::getInstance()->getUser()->getGuardUser()->getId() ));

        

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
                $partialSearch = $this->getPartial('comment/search', array('configuration' => $this->configuration));
            }

            if ($request->hasParameter('_reset')) {
                $partialFilter = $this->getPartial('comment/filters', array('form' => $this->filters, 'configuration' => $this->configuration));
            }

            $partialList = $this->getPartial('comment/list', array('pager' => $this->pager, 'sort' => $this->sort, 'helper' => $this->helper));

            if (isset($partialSearch)) {
                $partialList .= '#__filter__#' . $partialSearch;
            }
            if (isset($partialFilter)) {
                $partialList .= '#__filter__#' . $partialFilter;
            }
            return $this->renderText($partialList);
        }
    }

    public function executeStatisticsPost(sfWebRequest $request) {
        $this->statisticsPost = Doctrine::getTable('Comment')->getStatisticsPost();
    //    die("<pre>".print_r($this->statisticsPost,1)."</pre>");
        }

    public function executeStatisticsComment(sfWebRequest $request) {
        $this->statisticsComment = Doctrine::getTable('Comment')->getStatisticsComment();
      //  die("<pre>".print_r($this->statisticsComment,1)."</pre>");
    }
  public function executeEdit(sfWebRequest $request)
  {
        $q = Doctrine::getTable('Comment')->findByUserIdAndId(sfContext::getInstance()->getUser()->getGuardUser()->getId(), $request->getParameter('id'));
        if ($q->count() <> 0 || $this->getUser()->hasCredential(array('Editor')) || $this->getUser()->hasCredential(array('Administrador'))) {

            $this->comment = $this->getRoute()->getObject();
            $this->form = $this->configuration->getForm($this->comment);
        } else {
            $this->redirect404();
        }
  }
}
