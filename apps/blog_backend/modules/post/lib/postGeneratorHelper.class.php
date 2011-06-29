<?php

/**
 * post module helper.
 *
 * @package    shimano
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postGeneratorHelper extends BasePostGeneratorHelper {

    public function linkToSave($object, $params) {
        return '<input type="submit" class="graybutton f_left" value="' . __($params['label'], array(), 'sf_admin') . '" name="_save" />';
    }

    public function linkToShow($object, $params) {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'] != 'Show' ? $params['label'] : 'Preview', array(), 'sf_admin'), $this->getUrlForAction('show'), $object) . '</li>';
    }

}
