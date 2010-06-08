<?php

/**
 * ServiceItem form base class.
 *
 * @method ServiceItem getObject() Returns the current form's model object
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServiceItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'service_id' => new sfWidgetFormInputHidden(),
      'item_id'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'service_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('service_id')), 'empty_value' => $this->getObject()->get('service_id'), 'required' => false)),
      'item_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('item_id')), 'empty_value' => $this->getObject()->get('item_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('service_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ServiceItem';
  }

}
