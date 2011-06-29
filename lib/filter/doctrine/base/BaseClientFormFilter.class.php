<?php

/**
 * Client filter form base class.
 *
 * @package    Blog
 * @subpackage filter
 * @author     Conates
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClientFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'commune'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'user_type'     => new sfWidgetFormChoice(array('choices' => array('' => '', 'Web' => 'Web', 'Blog' => 'Blog', 'Web-Blog' => 'Web-Blog'))),
    ));

    $this->setValidators(array(
      'first_name'    => new sfValidatorPass(array('required' => false)),
      'last_name'     => new sfValidatorPass(array('required' => false)),
      'email_address' => new sfValidatorPass(array('required' => false)),
      'address'       => new sfValidatorPass(array('required' => false)),
      'number'        => new sfValidatorPass(array('required' => false)),
      'city'          => new sfValidatorPass(array('required' => false)),
      'commune'       => new sfValidatorPass(array('required' => false)),
      'username'      => new sfValidatorPass(array('required' => false)),
      'password'      => new sfValidatorPass(array('required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'user_type'     => new sfValidatorChoice(array('required' => false, 'choices' => array('Web' => 'Web', 'Blog' => 'Blog', 'Web-Blog' => 'Web-Blog'))),
    ));

    $this->widgetSchema->setNameFormat('client_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Client';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'first_name'    => 'Text',
      'last_name'     => 'Text',
      'email_address' => 'Text',
      'address'       => 'Text',
      'number'        => 'Text',
      'city'          => 'Text',
      'commune'       => 'Text',
      'username'      => 'Text',
      'password'      => 'Text',
      'user_id'       => 'ForeignKey',
      'user_type'     => 'Enum',
    );
  }
}
