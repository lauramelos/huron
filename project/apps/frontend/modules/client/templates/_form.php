<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@client') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php /*foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('client/form_fieldset', array('client' => $client, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach;*/ ?>

  <fieldset>
    <div><div><?php echo $form['name']->renderRow() ?></div></div>    
    <div><div><?php echo $form['address']->renderRow() ?></div></div>
    <div><div><?php echo $form['phone']->renderRow() ?></div></div>
    <div><div><?php echo $form['cuit']->renderRow() ?></div></div>
    <div><div><?php echo $form['logo']->renderRow() ?></div></div>
    <table>
      <tr>
        <td></td><td></td>
      </tr>
      <tr>
        <td></td><td></td>
      </tr>
    </table>
  </fieldset>
  

    <?php include_partial('client/form_actions', array('client' => $client, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
