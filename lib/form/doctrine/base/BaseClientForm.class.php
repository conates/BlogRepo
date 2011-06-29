<?php

/**
 * Client form base class.
 *
 * @method Client getObject() Returns the current form's model object
 *
 * @package    Blog
 * @subpackage form
 * @author     Conates
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClientForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'first_name'    => new sfWidgetFormInputText(),
      'last_name'     => new sfWidgetFormInputText(),
      'email_address' => new sfWidgetFormInputText(),
      'address'       => new sfWidgetFormInputText(),
      'number'        => new sfWidgetFormInputText(),
      'city'          => new sfWidgetFormInputText(),
      'commune'       => new sfWidgetFormInputText(),
      'username'      => new sfWidgetFormInputText(),
      'password'      => new sfWidgetFormInputText(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'user_type'     => new sfWidgetFormChoice(array('choices' => array('Web' => 'Web', 'Blog' => 'Blog', 'Web-Blog' => 'Web-Blog'))),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'    => new sfValidatorString(array('max_length' => 150)),
      'last_name'     => new sfValidatorString(array('max_length' => 150)),
      'email_address' => new sfValidatorString(array('max_length' => 150)),
      'address'       => new sfValidatorString(array('max_length' => 150)),
      'number'        => new sfValidatorString(array('max_length' => 8)),
      'city'          => new sfValidatorString(array('max_length' => 150)),
      'commune'       => new sfValidatorString(array('max_length' => 150)),
      'username'      => new sfValidatorString(array('max_length' => 150)),
      'password'      => new sfValidatorString(array('max_length' => 150)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'user_type'     => new sfValidatorChoice(array('choices' => array(0 => 'Web', 1 => 'Blog', 2 => 'Web-Blog'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Client';
  }

}
