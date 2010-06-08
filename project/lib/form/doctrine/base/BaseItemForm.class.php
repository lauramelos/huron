<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'proposal_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Proposal'), 'add_empty' => true)),
      'service_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Services'), 'add_empty' => true)),
      'amount'        => new sfWidgetFormInputText(),
      'unit_cost'     => new sfWidgetFormInputText(),
      'comments'      => new sfWidgetFormTextarea(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'services_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Service')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'proposal_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Proposal'), 'required' => false)),
      'service_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Services'), 'required' => false)),
      'amount'        => new sfValidatorInteger(array('required' => false)),
      'unit_cost'     => new sfValidatorNumber(array('required' => false)),
      'comments'      => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'services_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Service', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['services_list']))
    {
      $this->setDefault('services_list', $this->object->Services->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveServicesList($con);

    parent::doSave($con);
  }

  public function saveServicesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['services_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Services->getPrimaryKeys();
    $values = $this->getValue('services_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Services', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Services', array_values($link));
    }
  }

}
