<?php

/**
 * Client form.
 *
 * @package    limbo
 * @subpackage form
 * @author     Damian Suarez / Laura Melo
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClientForm extends BaseClientForm
{
  protected $scheduledForDeletion = array();

  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['contacts_list']);

    $newContact = new ClientContactForm();
    
    $newContact->setDefault('client_id', $this->object->id);
    $this->embedForm('new', $newContact);


     /*$newContact = new ClientContact();
     $newContact->Client = $this->getObject();
     $subForm =new ClientContactForm($newContact);
     $this->embedForm('new', $subForm);*/

      $this->embedRelation('Contacts');
  }

 protected function doBind(array $values)
  {
   if($this->isNew()){
     unset($values['new'], $this['new']);
   }
   elseif ( $this->isValid() && '' === trim($values['new']['first_name']) && '' === trim($values['new']['last_name'])&& '' === trim($values['new']['position']))
    {
      unset($values['new'], $this['new']);
    }

    if (isset($values['Contacts']))
    {
      foreach ($values['Contacts'] as $i => $bookmarkValues)
      {
        if (isset($bookmarkValues['delete']) && $bookmarkValues['id'])
        {
          $this->scheduledForDeletion[$i] = $bookmarkValues['id'];
        }
      }
    }
  
    parent::doBind($values);
  }

  /**
   * Updates object with provided values, dealing with evantual relation deletion
   *
   * @see sfFormDoctrine::doUpdateObject()
   */
  protected function doUpdateObject($values)
  {
    if (count($this->scheduledForDeletion))
    {
      foreach ($this->scheduledForDeletion as $index => $id)
      {
        unset($values['Contacts'][$index]);
        unset($this->object['Contacts'][$index]);
        Doctrine::getTable('ClientContact')->findOneById($id)->delete();
      }
    }

    $this->getObject()->fromArray($values);
  }

  /**
   * Saves embedded form objects.
   *
   * @param mixed $con   An optional connection object
   * @param array $forms An array of forms
   */
  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $con)
    {
      $con = $this->getConnection();
    }

    if (null === $forms)
    {
      $forms = $this->embeddedForms;
    }

    foreach ($forms as $form)
    {
      if ($form instanceof sfFormObject)
      {
        if (!in_array($form->getObject()->getId(), $this->scheduledForDeletion))
        {
          $form->saveEmbeddedForms($con);
          $form->getObject()->save($con);
        }
      }
      else
      {
        $this->saveEmbeddedForms($con, $form->getEmbeddedForms());
      }
    }
  }

}
