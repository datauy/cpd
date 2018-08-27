<script type="text/javascript">
  document.body.className = 'game';
  document.getElementById("block-system-main").className="game sopa";
</script>
<label><?php echo $form["game_elements"]['info']['#eje']; ?> <?php echo $form['page_number']["#markup"]?></label>
<p class="texto_pregunta">
  <?php echo $form["game_elements"]["game"]["#title"];?>
</p>
<div id="question_content" class="question_truefalse">
    <input type="hidden" value="<?php echo $form["game_elements"]['words']['#list']; ?>" id="wordlist" />
    <div class="row">
      <div id='puzzle'></div>
      <div id='words'></div>
      <!--div><button type="button" id='solve'>Solve Puzzle</button></div>-->
    </div>
    <div class="row">
      <div class="col-md-12">
          <?php print render($form['next']); ?>
      </div>
    </div>
</div>
