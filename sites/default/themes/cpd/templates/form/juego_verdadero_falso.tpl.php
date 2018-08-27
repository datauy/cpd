<script type="text/javascript">
  document.body.className = 'game';
  document.getElementById("block-system-main").className="game";
</script>
<label><?php echo $form["game_elements"]['info']['#eje']; ?> <?php echo $form['page_number']["#markup"]?></label>
<p class="texto_pregunta"><?php echo $form["game_elements"]["game"]["#title"];?></p>

<?php if($form["game_elements"]["game"]["#has_img_question"]==true){ ?>
<figure>
  <?php print_r($form["game_elements"]['game_img_question']['#img']);?>
</figure>
<?php } ?>

<?php if($form["game_elements"]["game"]["#has_img_answers"]==false){ ?>
  <a id="button_true" onclick='clickTrueOrFalseAnswer("1",this)' href="#" class="button_secondary">Verdadero</a>
  <a id="button_false" onclick='clickTrueOrFalseAnswer("0",this)' href="#" class="button_secondary">Falso</a>
<?php } ?>

<?php if($form["game_elements"]["game"]["#has_img_answers"]==true){ ?>
  <a id="button_true" onclick='clickTrueOrFalseAnswer("1",this)' href="#" class="button_secondary"><?php print $form["game_elements"]['game_img']['#options_img'][0];?> Verdadero</a>
  <a id="button_false" onclick='clickTrueOrFalseAnswer("0",this)' href="#" class="button_secondary"><?php print $form["game_elements"]['game_img']['#options_img'][1];?> Falso</a>
<?php } ?>

<?php print render($form['next']); ?>
