<?php

/**
 * ClientContact filter form base class.
 *
 * @package    limbo
 * @subpackage filter
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClientContactFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'first_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position'    => new sfWidgetFormFilterInput(),
      'phone'       => new sfWidgetFormFilterInput(),
      'movil'       => new sfWidgetFormFilterInput(),
      'email'       => new sfWidgetFormFilterInput(),
      'address'     => new sfWidgetFormFilterInput(),
      'address_2'   => new sfWidgetFormFilterInput(),
      'locality_id' => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'client_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Client'), 'column' => 'id')),
      'first_name'  => new sfValidatorPass(array('required' => false)),
      'last_name'   => new sfValidatorPass(array('required' => false)),
      'position'    => new sfValidatorPass(array('required' => false)),
      'phone'       => new sfValidatorPass(array('required' => false)),
      'movil'       => new sfValidatorPass(array('required' => false)),
      'email'       => new sfValidatorPass(array('required' => false)),
      'address'     => new sfValidatorPass(array('required' => false)),
      'address_2'   => new sfValidatorPass(array('required' => false)),
      'locality_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('client_contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClientContact';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'client_id'   => 'ForeignKey',
      'first_name'  => 'Text',
      'last_name'   => 'Text',
      'position'    => 'Text',
      'phone'       => 'Text',
      'movil'       => 'Text',
      'email'       => 'Text',
      'address'     => 'Text',
      'address_2'   => 'Text',
      'locality_id' => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
