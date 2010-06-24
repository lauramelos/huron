<?php

/**
 * ClientContact form.
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClientContactForm extends BaseClientContactForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->widgetSchema['client_id'] = new sfWidgetFormInputHidden();

    if ($this->object->exists())
    {
      $this->widgetSchema['delete'] = new sfWidgetFormInputCheckbox();
      $this->validatorSchema['delete'] = new sfValidatorPass();
    }

  }
}
