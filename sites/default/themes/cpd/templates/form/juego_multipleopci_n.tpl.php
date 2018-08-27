<script type="text/javascript">
  document.body.className = 'game';
  document.getElementById("block-system-main").className="game";
</script>
<label><?php echo $form["game_elements"]['info']['#eje']; ?> <?php echo $form['page_number']["#markup"]?></label>
<p class="texto_pregunta">
  <?php echo $form["game_elements"]["game"]["#title"];?>
</p>
<?php if($form["game_elements"]["game"]["#has_img_question"]==true){ ?>
<figure>
  <?php print_r($form["game_elements"]['game_img_question']['#img']);?>
</figure>
<?php } ?>

<?php if($form["game_elements"]["game"]["#has_img_answers"]==false){ ?>
  <?php
    foreach ($form["game_elements"]['game']['#options'] as $key => $option) {
   ?>
    <?php if($form["game_elements"]['game']['#type'] == 'radios'){ ?>
      <a id="container_<?php echo $key; ?>" onclick="clickOnlyOneOption('<?php echo $key; ?>',this)" class="button_secondary"><?php echo $option; ?></a>
      <?php }else{ ?>
        <a id="container_<?php echo $key; ?>" onclick="clickOption('<?php echo $key; ?>',this)" class="button_secondary"><?php echo $option; ?></a>
      <?php } ?>
  <?php } ?>
  <?php print render($form['next']); ?>
<?php } ?>

<?php if($form["game_elements"]["game"]["#has_img_answers"]==true){ ?>
  <?php
    foreach ($form["game_elements"]['game']['#options'] as $key => $option) {
   ?>
    <?php if($form["game_elements"]['game']['#type'] == 'radios'){ ?>
      <a id="container_<?php echo $key; ?>" onclick="clickOnlyOneOption('<?php echo $key; ?>',this)" class="button_secondary"><?php print_r($form["game_elements"]['game_img']['#options_img'][$key]);?> <span><?php echo $option; ?></span></a>
    <?php }else{ ?>
      <a id="container_<?php echo $key; ?>" onclick="clickOption('<?php echo $key; ?>',this)" class="button_secondary"><?php print_r($form["game_elements"]['game_img']['#options_img'][$key]);?> <span><?php echo $option; ?></span></a>
    <?php } ?>
  <?php } ?>
  <?php print render($form['next']); ?>
<?php } ?>
