<nav class="menu">
  <ul>
    <li><a href="<?php echo url_for('@homepage') ?>"><span class="home"></span><?php echo __('Start'); ?></a></li>
    <li>
      <a><span class="pages"></span><?php echo __('Proposal'); ?></a>
      <ul>
        <li><a href="<?php echo url_for('@proposal') ?>"><span class="list_pages"></span><?php echo __('List'); ?></a></li>
        <li><a href="<?php echo url_for('@proposal_new') ?>"><span class="add"></span><?php echo __('New Proposal'); ?></a></li>
        <li><a href="<?php echo url_for('@client_new') ?>"><span class="add"></span><?php echo __('New Client'); ?></a></li>
        <li><a href="<?php echo url_for('@service_new') ?>"><span class="add"></span><?php echo __('New Service'); ?></a></li>
      </ul>
    </li>
    <li>
      <a><span class="config"></span><?php echo __('Configuration'); ?></a>
      <ul>
        <li><a href="<?php echo url_for('@config') ?>"><span></span><?php echo __('Detail'); ?></a></li>
        <li>
          <a><span class="users"></span><?php echo __('Users'); ?></a>
          <ul>
            <li><a href="<?php echo url_for('@sf_moodoo_user') ?>"><span class="users"></span><?php echo __('List'); ?></a></li>
            <li><a href="<?php echo url_for('@sf_moodoo_user_new') ?>"><span class="add"></span><?php echo __('Add user'); ?></a></li>
            <li><?php echo link_to(__('Groups'), '@sf_moodoo_group') ?></li>
            <li><?php echo link_to(__('Permissions'), '@sf_moodoo_permission') ?></li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</nav>