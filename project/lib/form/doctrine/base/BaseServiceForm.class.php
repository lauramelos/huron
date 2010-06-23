<?php

/**
 * Service form base class.
 *
 * @method Service getObject() Returns the current form's model object
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServiceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'description'      => new sfWidgetFormTextarea(),
      'unit_cost'        => new sfWidgetFormInputText(),
      'measurement_unit' => new sfWidgetFormInputText(),
      'type'             => new sfWidgetFormChoice(array('choices' => array('labor' => 'labor', 'replacement' => 'replacement'))),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'description'      => new sfValidatorString(array('required' => false)),
      'unit_cost'        => new sfValidatorNumber(array('required' => false)),
      'measurement_unit' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'type'             => new sfValidatorChoice(array('choices' => array(0 => 'labor', 1 => 'replacement'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('service[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Service';
  }

}
