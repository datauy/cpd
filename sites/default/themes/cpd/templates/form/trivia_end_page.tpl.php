<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.12&appId=167875006726883&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">
  document.body.className = 'game';
  document.getElementById("block-system-main").className="game";
</script>
<h3 class="no_answer_title">¡Terminaste!</h3>
<p class="texto_pregunta">
  <?php if($form['stage_type']["#username"]!="usuario anónimo"){ ?>
    <?php echo $form['stage_type']["#username"]; ?>,
  <?php } ?>
  Ojalá estas preguntas te hayan ayudado a pensar sobre tus derechos y los de otros.
¿Te gustó? ¡Entonces compartí esta plataforma y ayudanos a difundirla!
</p>
<a id="facebook_btn" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fcpdv3.development.datauy.org%2F&amp;src=sdkpreparse" class="button_secondary"><i></i>Compartir en Facebook</a>
<a id="twitter_btn"  target="_blank" href="https://twitter.com/home?status=http%3A//cpdv3.development.datauy.org%0A%0ALa%20Estrategia%20CPD%20busca%20fortalecer%20y%20generar%20nuevas%20pr%C3%A1cticas%20en%20promoci%C3%B3n%20de%20derechos%20humanos%20en%20centros%20de%20educaci%C3%B3n%20media.%20Te%20invitamos%20a%20aprender%20a%20trav%C3%A9s%20de%20juegos%20y%20%20audiovisuales,%20y%20ofrecemos%20material%20para%20docentes%20y%20centros." class="button_secondary"><i></i>Compartir en Twitter</a>

<a href="/trivia" class="button">Seguir jugando</a>
