<?php

/**
 * Post form.
 *
 * @package    shimano
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PostForm extends BasePostForm {

    public function configure() {
        $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCE(array(
                    'height' => 500,
                    'config' => 'skin : "o2k7",
                        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
                        
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true',
                    'theme' => 'advanced',
                ));


        $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
                    'config' => '{}',
                ));
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->setDefault('user_id', sfContext::getInstance()->getUser()->getGuardUser()->getId());
        $state = array('Pendiente'=>'Pendiente');
        if (sfContext::getInstance()->getUser()->hasCredential(array('Autor', 'Colaborador'), false)) {
            $this->widgetSchema['state'] = new sfWidgetFormChoice(array(
                        'choices' => $state,
                    ));
        }
    }

}
