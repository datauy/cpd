<script type="text/javascript">
  document.getElementById("block-system-main").className="game";
</script>
<h3 class="no_answer_title"><?php echo $form["game_result"]["#markup"]; ?></h3>
<label>Respuesta</label>
<p class="texto_pregunta">
 <?php echo $form["game_message"]["#markup"]; ?>
</p>
<?php print render($form['next']); ?>
