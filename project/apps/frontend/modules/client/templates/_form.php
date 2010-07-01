<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@client') ?>
    <?php echo $form->renderHiddenFields() ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php /* foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php //include_partial('client/form_fieldset', array('client' => $client, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach;*/ ?>

  <fieldset>
    <div><div><?php echo $form['name']->renderRow() ?></div></div>    
    <div><div><?php echo $form['address']->renderRow() ?></div></div>
    <div><div><?php echo $form['phone']->renderRow() ?></div></div>
    <div><div><?php echo $form['cuit']->renderRow() ?></div></div>
    <div><div><?php echo $form['logo']->renderRow() ?></div></div>

<?php if(!$form->isNew() && isset ($form['new'])): ?>
    <table class="subform">
      <caption>Contactos</caption>
      <tr>
        <th><?php echo $form['new']['first_name']->renderLabel() ?></th>
        <th><?php echo $form['new']['last_name']->renderLabel() ?></th>
        <th><?php echo $form['new']['position']->renderLabel() ?></th>
        <th><?php echo $form['new']['phone']->renderLabel() ?></th>
        <th><?php echo $form['new']['movil']->renderLabel() ?></th>
        <th><?php echo $form['new']['email']->renderLabel() ?></th>
        <th><?php echo $form['new']['address']->renderLabel() ?></th>
      </tr>
      <tr>
        <?php echo $form['new']->renderHiddenFields(); ?>


        <td><?php echo $form['new']['first_name']->renderError() ?><?php echo $form['new']['first_name']->render() ?></td>
        <td><?php echo $form['new']['last_name']->renderError() ?><?php echo $form['new']['last_name']->render() ?></td>
        <td><?php echo $form['new']['position']->renderError() ?><?php echo $form['new']['position']->render() ?></td>
        <td><?php echo $form['new']['phone']->renderError() ?><?php echo $form['new']['phone']->render() ?></td>
        <td><?php echo $form['new']['movil']->renderError() ?><?php echo $form['new']['movil']->render() ?></td>
        <td><?php echo $form['new']['email']->renderError() ?><?php echo $form['new']['email']->render() ?></td>
        <td><?php echo $form['new']['address']->renderError() ?><?php echo $form['new']['address']->render() ?></td>
        <td> * <?php echo __('New') ?></td>
      </tr>
       <?php foreach ($form['Contacts'] as $i => $eForm): ?>

      <tr>
         <?php echo $eForm->renderHiddenFields() ?>
      
        <td><?php echo $eForm['first_name']->renderError() ?><?php echo $eForm['first_name']->render() ?></td>
        <td><?php echo $eForm['last_name']->renderError() ?><?php echo $eForm['last_name']->render() ?></td>
        <td><?php echo $eForm['position']->renderError() ?><?php echo $eForm['position']->render() ?></td>
        <td><?php echo $eForm['phone']->renderError() ?><?php echo $eForm['phone']->render() ?></td>
        <td><?php echo $eForm['movil']->renderError() ?><?php echo $eForm['movil']->render() ?></td>
        <td><?php echo $eForm['email']->renderError() ?><?php echo $eForm['email']->render() ?></td>
        <td><?php echo $eForm['address']->renderError() ?><?php echo $eForm['address']->render() ?></td>
        <td><?php echo $eForm['delete']->render() ?>
          <?php echo $eForm['delete']->renderError() ?>
          <?php echo $eForm['delete']->renderLabel(__('Delete')) ?></td>

      </tr>
      <?php endforeach; ?>
      
    </table>
      <?php endif; ?>
  </fieldset>
  

    <?php include_partial('client/form_actions', array('client' => $client, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
