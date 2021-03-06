<?php

/**
 * ClientContact form base class.
 *
 * @method ClientContact getObject() Returns the current form's model object
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClientContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'client_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'first_name'  => new sfWidgetFormInputText(),
      'last_name'   => new sfWidgetFormInputText(),
      'position'    => new sfWidgetFormInputText(),
      'phone'       => new sfWidgetFormInputText(),
      'movil'       => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'address'     => new sfWidgetFormInputText(),
      'address_2'   => new sfWidgetFormInputText(),
      'locality_id' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'client_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'required' => false)),
      'first_name'  => new sfValidatorString(array('max_length' => 100)),
      'last_name'   => new sfValidatorString(array('max_length' => 100)),
      'position'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'phone'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'movil'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'address'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'address_2'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'locality_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('client_contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientContact';
  }

}
