<?php

/**
 * Proposal filter form base class.
 *
 * @package    limbo
 * @subpackage filter
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProposalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'description'  => new sfWidgetFormFilterInput(),
      'number'       => new sfWidgetFormFilterInput(),
      'comments'     => new sfWidgetFormFilterInput(),
      'currency'     => new sfWidgetFormFilterInput(),
      'delivery'     => new sfWidgetFormFilterInput(),
      'bid_validity' => new sfWidgetFormFilterInput(),
      'payment_term' => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'client_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Client'), 'column' => 'id')),
      'date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'description'  => new sfValidatorPass(array('required' => false)),
      'number'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comments'     => new sfValidatorPass(array('required' => false)),
      'currency'     => new sfValidatorPass(array('required' => false)),
      'delivery'     => new sfValidatorPass(array('required' => false)),
      'bid_validity' => new sfValidatorPass(array('required' => false)),
      'payment_term' => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('proposal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Proposal';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'client_id'    => 'ForeignKey',
      'date'         => 'Date',
      'description'  => 'Text',
      'number'       => 'Number',
      'comments'     => 'Text',
      'currency'     => 'Text',
      'delivery'     => 'Text',
      'bid_validity' => 'Text',
      'payment_term' => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
