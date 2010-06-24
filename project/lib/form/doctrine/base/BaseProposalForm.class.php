<?php

/**
 * Proposal form base class.
 *
 * @method Proposal getObject() Returns the current form's model object
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProposalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'client_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'date'         => new sfWidgetFormDateTime(),
      'description'  => new sfWidgetFormTextarea(),
      'number'       => new sfWidgetFormInputText(),
      'comments'     => new sfWidgetFormTextarea(),
      'currency'     => new sfWidgetFormInputText(),
      'delivery'     => new sfWidgetFormInputText(),
      'bid_validity' => new sfWidgetFormInputText(),
      'payment_term' => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'client_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'required' => false)),
      'date'         => new sfValidatorDateTime(array('required' => false)),
      'description'  => new sfValidatorString(array('required' => false)),
      'number'       => new sfValidatorInteger(array('required' => false)),
      'comments'     => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'currency'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'delivery'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bid_validity' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'payment_term' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('proposal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proposal';
  }

}
