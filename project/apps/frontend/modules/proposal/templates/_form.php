<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@proposal') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php /*foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('proposal/form_fieldset', array('proposal' => $proposal, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; */ ?>

  <fieldset>
    <div><div><?php echo $form['client_id']->renderRow() ?></div></div>
    <div><div><?php echo $form['date']->renderLabel() ?><div class="content"><?php echo $form['date']->renderError() ?><?php echo $form['date']->render() ?></div></div></div>
    <div><div><?php echo $form['description']->renderRow() ?></div></div>
    <div><div><?php echo $form['number']->renderRow() ?></div></div>
    <div><div><?php echo $form['comments']->renderRow() ?></div></div>
 <div><div><?php echo $form['currency']->renderRow() ?></div></div>
 <div><div><?php echo $form['delivery']->renderRow() ?></div></div>
 <div><div><?php echo $form['bid_validity']->renderRow() ?></div></div>
 <div><div><?php echo $form['payment_term']->renderRow() ?></div></div>
<?php if(!$form->isNew() && isset ($form['new'])): ?>

    <?php // echo $form['new']->renderError() ?>

    <table class="subform">
      <caption>Contactos</caption>
      <tr>
        <th><?php echo $form['new']['service_id']->renderLabel() ?></th>
        <th><?php echo $form['new']['comments']->renderLabel() ?></th>
        <th><?php echo $form['new']['amount']->renderLabel() ?></th>
        <th><?php echo $form['new']['unit_cost']->renderLabel() ?></th>
        <th></th>
      </tr>
      <tr>
        <?php echo $form['new']->renderHiddenFields(); ?>
<?php //echo $form['new']->renderGlobalErrors(); ?>
        <td><?php echo $form['new']['service_id']->renderError() ?><?php echo $form['new']['service_id']->render() ?></td>
        <td><?php echo $form['new']['comments']->renderError() ?><?php echo $form['new']['comments']->render() ?></td>
        <td><?php echo $form['new']['amount']->renderError() ?><?php echo $form['new']['amount']->render() ?></td>
        <td><?php echo $form['new']['unit_cost']->renderError() ?><?php echo $form['new']['unit_cost']->render() ?></td>
        
        <td> * <?php echo __('New') ?></td>
      </tr>
       <?php foreach ($form['Items'] as $i => $eForm): ?>

      <tr>
         <?php echo $eForm->renderHiddenFields() ?>
        <td><?php echo $eForm['service_id']->renderError() ?><?php echo $eForm['service_id']->render() ?></td>
        <td><?php echo $eForm['comments']->renderError() ?><?php echo $eForm['comments']->render() ?></td>
        <td><?php echo $eForm['amount']->renderError() ?><?php echo $eForm['amount']->render() ?></td>
        <td><?php echo $eForm['unit_cost']->renderError() ?><?php echo $eForm['unit_cost']->render() ?></td>
        <td><?php echo $eForm['delete']->render() ?>
          <?php echo $eForm['delete']->renderError() ?>
          <?php echo $eForm['delete']->renderLabel(__('Delete')) ?></td>

      </tr>
      <?php endforeach; ?>

    </table>
      <?php endif; ?>
  </fieldset>




    <?php include_partial('proposal/form_actions', array('proposal' => $proposal, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
