<?php

/**
 * category module helper.
 *
 * @package    shimano
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryGeneratorHelper extends BaseCategoryGeneratorHelper
{
    public function linkToSave($object, $params) {
        return '<input type="submit" class="graybutton f_left" value="' . __($params['label'], array(), 'sf_admin') . '" name="_save" />';
    }
}
