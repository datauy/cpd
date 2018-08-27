<script type="text/javascript">
  document.getElementById("block-system-main").className="register";
</script>

      <label>Primer Paso</label>
      <h2>¿Cuál es tu nombre?</h2>
        <div class="input">
            <?php print render($form['name']); ?>
        </div>
        <div class="input">
            <div class="select_inner">
              <?php print render($form['center']); ?>
            </div>
            <?php print render($form['specify_center']); ?>
        </div>
      <?php print render($form['next']); ?>
      <?php print render($form['next_anonymus']); ?>
