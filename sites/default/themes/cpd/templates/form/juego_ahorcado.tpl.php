<script type="text/javascript">
  document.body.className = 'game ahorcado';
  document.getElementById("block-system-main").className="game ahorcado";
</script>
<label style="margin-top:0px;"><?php echo $form["game_elements"]['info']['#eje']; ?> <?php echo $form['page_number']["#markup"]?></label>
<p style="margin-top:-10px;" class="texto_pregunta"><?php echo $form["game_elements"]["game"]["#title"];?></p>

<?php if($form["game_elements"]["game"]["#has_img_question"]==true){ ?>
<figure>
  <?php print_r($form["game_elements"]['game_img_question']['#img']);?>
</figure>
<?php } ?>

<div style="margin-top:-10px;" id="frase_parseada" class="typos">
  <div class="typo"></div>
  <div class="typo"></div>
  <div class="typo"></div>
  <div class="typo"></div>
  <div class="typo"></div>
  <div class="typo"></div>
</div>
 <div id="keyboard">
    <div class="keyboard-row row-1">
    <div onclick="intentarLetraAhorcado(this)" id="key-q" class="key">
         <div  class="key-inner">
           <span>Q</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-w" class="key">
         <div class="key-inner">
           <span>W</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-e" class="key">
         <div class="key-inner">
           <span>E</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-r" class="key">
         <div class="key-inner">
           <span>R</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-t" class="key">
         <div class="key-inner">
           <span>T</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-y" class="key">
         <div class="key-inner">
           <span>Y</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-u" class="key">
         <div class="key-inner">
           <span>U</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-i" class="key">
         <div class="key-inner">
           <span>I</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-o" class="key">
         <div class="key-inner">
           <span>O</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-p" class="key">
       <div class="key-inner">
         <span>P</span>
    </div>
  </div>

  </div>
  <div class="keyboard-row row-2">
    <div onclick="intentarLetraAhorcado(this)" id="key-a" class="key">
         <div class="key-inner">
           <span>A</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-s" class="key">
         <div class="key-inner">
           <span>S</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-d" class="key">
         <div class="key-inner">
           <span>D</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-f" class="key">
         <div class="key-inner">
           <span>F</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-g" class="key">
         <div class="key-inner">
           <span>G</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-h" class="key">
         <div class="key-inner">
           <span>H</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-j" class="key">
         <div class="key-inner">
           <span>J</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-k" class="key">
         <div class="key-inner">
           <span>K</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-l" class="key">
         <div class="key-inner">
           <span>L</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-ñ" class="key">
       <div class="key-inner">
         <span>Ñ</span>
    </div>
  </div>

  </div>
  <div class="keyboard-row row-e">
    <div onclick="intentarLetraAhorcado(this)" id="key-z" class="key">
         <div class="key-inner">
           <span>Z</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-x" class="key">
         <div class="key-inner">
           <span>X</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-c" class="key">
         <div class="key-inner">
           <span>C</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-v" class="key">
         <div class="key-inner">
           <span>V</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-b" class="key">
         <div class="key-inner">
           <span>B</span>
      </div>
    </div>
      <div onclick="intentarLetraAhorcado(this)" id="key-n" class="key">
         <div class="key-inner">
           <span>N</span>
      </div>
    </div>
    <div onclick="intentarLetraAhorcado(this)" id="key-m" class="key">
         <div class="key-inner">
           <span>M</span>
      </div>
    </div>

    </div>
</div>
<div id="intentos">
  <?php
    for( $i= 0 ; $i < $form["game_elements"]['intentos']['#count'] ; $i++ ) {
   ?>
   <i class="intento"><img src="<?php echo $base_url; ?>/img/good.svg"></i>
  <?php } ?>
</div>
<?php print render($form['next']); ?>
