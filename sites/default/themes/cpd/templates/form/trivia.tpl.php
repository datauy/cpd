<?php  $base_url = "/sites/default/themes/cpd"; ?>

<?php if(isset($form['stage_type']["#markup"])){ ?>
  <?php include $form['stage_type']["#markup"].'.tpl.php'; ?>
<?php } ?>

<div style="display: none;">
  <?php print drupal_render_children($form); ?>
</div>
