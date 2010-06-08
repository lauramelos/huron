<?php

/**
 * Service filter form base class.
 *
 * @package    limbo
 * @subpackage filter
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServiceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'      => new sfWidgetFormFilterInput(),
      'unit_cost'        => new sfWidgetFormFilterInput(),
      'measurement_unit' => new sfWidgetFormFilterInput(),
      'type'             => new sfWidgetFormChoice(array('choices' => array('' => '', 'labor' => 'labor', 'replacement' => 'replacement'))),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'items_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Item')),
    ));

    $this->setValidators(array(
      'description'      => new sfValidatorPass(array('required' => false)),
      'unit_cost'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'measurement_unit' => new sfValidatorPass(array('required' => false)),
      'type'             => new sfValidatorChoice(array('required' => false, 'choices' => array('labor' => 'labor', 'replacement' => 'replacement'))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'items_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Item', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('service_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addItemsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ServiceItem ServiceItem')
      ->andWhereIn('ServiceItem.service_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Service';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'description'      => 'Text',
      'unit_cost'        => 'Number',
      'measurement_unit' => 'Text',
      'type'             => 'Enum',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'items_list'       => 'ManyKey',
    );
  }
}
