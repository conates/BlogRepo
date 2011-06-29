<?php

/**
 * Comment form.
 *
 * @package    shimano
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentFronBlogForm extends BaseCommentForm {

    public function configure() {
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['post_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['state'] = new sfWidgetFormInputHidden();

        if (!sfContext::getInstance()->getUser()->isAuthenticated()) {
            $q = Doctrine::getTable('sfGuardUser')->findOneByUsername('visita');
            $this->setDefault('user_id', $q->getId());
        } else {
            $this->setDefault('user_id', sfContext::getInstance()->getUser()->getGuardUser()->getId());
            $this->setDefault('email', sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress());
        }
        $this->setDefault('state', 'Pendiente');
        $this->widgetSchema['name']->setLabel('Nombre');
        $this->widgetSchema['comment']->setLabel('Comentario');
        $this->widgetSchema['email']->setAttribute('class', 'required email');
        $this->widgetSchema['url']->setAttribute('class', 'required url');
        $this->widgetSchema['comment']->setAttribute('class', 'required');
        $this->widgetSchema['name']->setAttribute('minlength', '2');

    }

}
