<?php

/**
 * PostCategory filter form base class.
 *
 * @package    Blog
 * @subpackage filter
 * @author     Conates
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePostCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('post_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PostCategory';
  }

  public function getFields()
  {
    return array(
      'post_id'     => 'Number',
      'category_id' => 'Number',
    );
  }
}
