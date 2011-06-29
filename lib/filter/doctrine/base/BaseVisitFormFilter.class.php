<?php

/**
 * Visit filter form base class.
 *
 * @package    Blog
 * @subpackage filter
 * @author     Conates
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVisitFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ip'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'post_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Post'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'ip'      => new sfValidatorPass(array('required' => false)),
      'date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'post_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Post'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('visit_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Visit';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'ip'      => 'Text',
      'date'    => 'Date',
      'post_id' => 'ForeignKey',
    );
  }
}
