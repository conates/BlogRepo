<?php

/**
 * Comment form.
 *
 * @package    shimano
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm {

    public function configure() {
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->setDefault('user_id', sfContext::getInstance()->getUser()->getGuardUser()->getId());
        $this->setDefault('email', sfContext::getInstance()->getUser()->getGuardUser()->getEmailAddress());
        $state = array('Pendiente' => 'Pendiente');
        if (sfContext::getInstance()->getUser()->hasCredential(array('Autor', 'Colaborador'), false)) {
            $this->widgetSchema['state'] = new sfWidgetFormChoice(array(
                        'choices' => $state
                    ));
        }
    }

}
