<?php

/**
 * sfGuardUser module helper.
 *
 * @package    sfGuardPlugin
 * @subpackage sfGuardUser
 * @author     Fabien Potencier
 * @version    SVN: $Id: sfGuardUserGeneratorHelper.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardUserGeneratorHelper extends BaseSfGuardUserGeneratorHelper
{
    public function linkToSave($object, $params) {
        return '<input type="submit" class="graybutton f_left" value="' . __($params['label'], array(), 'sf_admin') . '" name="_save" />';
    }

    public function linkToShow($object, $params) {
        return '<li class="sf_admin_action_show">' . link_to(__($params['label'] != 'Show' ? $params['label'] : 'Preview', array(), 'sf_admin'), $this->getUrlForAction('show'), $object) . '</li>';
    }
}
