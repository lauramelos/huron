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
      'profile_id' => new sfWidgetFormInputHidden(),
      'client_id'  => new sfWidgetFormInputHidden(),
      'position'   => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'profile_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('profile_id')), 'empty_value' => $this->getObject()->get('profile_id'), 'required' => false)),
      'client_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('client_id')), 'empty_value' => $this->getObject()->get('client_id'), 'required' => false)),
      'position'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClientContact', 'column' => array('profile_id')))
    );

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
