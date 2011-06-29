<?php

/**
 * Visit form base class.
 *
 * @method Visit getObject() Returns the current form's model object
 *
 * @package    Blog
 * @subpackage form
 * @author     Conates
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVisitForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'ip'      => new sfWidgetFormInputText(),
      'date'    => new sfWidgetFormDate(),
      'post_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'ip'      => new sfValidatorString(array('max_length' => 150)),
      'date'    => new sfValidatorDate(array('required' => false)),
      'post_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Post'))),
    ));

    $this->widgetSchema->setNameFormat('visit[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visit';
  }

}
