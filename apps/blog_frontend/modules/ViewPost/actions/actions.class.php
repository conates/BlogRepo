<?php

/**
 * AllTrips actions.
 *
 * @package    Blog
 * @subpackage Blog
 * @author     Conates
 * @version    SVN: $Id: actions.class.php 923 2011-03-03 02:26:16Z conates%hosting.acid.cl $
 */
class ViewPostActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

//        $doctrine = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();
//        $query = $doctrine->query("exec sp_AGM_ConsultaBancos @IDAllgestEmpresa = 2, @IDEmpresa = 1");
//        $this->a = $query->fetchAll(PDO::FETCH_ASSOC);        
//        die('<pre>'.print_r($this->a,1)."</pre>");



    
        $this->formSign = new sfGuardFormSignin();
    if ($request->hasParameter('search'))
    {
    $this->posts = Doctrine_Core::getTable('Post')->getAllPost($request->getParameter('search'));

    }else{
        $this->posts = Doctrine_Core::getTable('Post')->getAllPost();
    }
        

        
        $this->pager = new sfDoctrinePager('Post',sfConfig::get('app_post_max_page'));
        $this->pager->setQuery($this->posts);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request) {
        
        $this->post = Doctrine_Core::getTable('Post')->findOneBySlug($request->getParameter('slug'));
        $this->comments = Doctrine_Core::getTable('Comment')->getAllPostComment($this->post->getId());
        $visita = Doctrine::getTable('Visit')->save($this->post->getId());
        $this->form = new CommentFronBlogForm();
        $this->formSign = new sfGuardFormSignin();
    }

    public function executeNew(sfWebRequest $request) {
        $request->isMethod(sfRequest::POST);
        $this->form = new CommentFronBlogForm();
        $this->processForm($request, $this->form);
        $this->formSign = new sfGuardFormSignin();
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $comment = $form->save();
            $this->redirect('@b_post?slug=' . $request->getParameter('slug'));
        } else {
            $this->setTemplate('error');
        }
    }

}
