(function ($) {

  var letras_ahorcado_actual = null;
  var frase_ahorcado_actual = null;
  var intentos_ahorcado_actual = 0;
  var vidas_comienzo=0;
  var frase_descubierta_hasta_ahora = null;
  var letras_intentadas = new Array();
  var frases_intentadas = new Array();
  var gano = false;
  $("#edit-next").removeClass("btn");
  $("#edit-next").removeClass("btn-default");
  $("#edit-next").removeClass("form-submit");
  $("#edit-next").addClass("btn_primary");

  mostrarAhorcado = function(frase,letras,intentos){
    frase_descubierta_hasta_ahora ="";
    $("[name='form_resultado_ahorcado']").val(0);
    $("[name='form_intentos_restantes_ahorcado']").val(intentos);
    frase_ahorcado_actual = frase;
    letras_ahorcado_actual = letras;
    intentos_ahorcado_actual = intentos; //Vidas restantes
    vidas_comienzo = intentos;
    //alert(letras);
    var letras_array = letras.split("|");
    var letras_frase = frase.split('');
    var frase_parseada = "";
    letras_frase.forEach(function(item,index,arr){
      //alert(item);
      var newChar = '<div class="typo"></div>';
      if(item==" "){
        newChar = '<div class="typo"><span>/</span></div>';
        frase_descubierta_hasta_ahora = frase_descubierta_hasta_ahora + "/";
      }else if(letras_array.indexOf(item)>=0){
        newChar = '<div class="typo"><span>'+item+'</span></div>';
        frase_descubierta_hasta_ahora = frase_descubierta_hasta_ahora + item;
      }else{
        frase_descubierta_hasta_ahora = frase_descubierta_hasta_ahora + "_"
      }
      frase_parseada = frase_parseada + newChar;
    });
    $("#frase_parseada").html(frase_parseada);
    return false;
  };

  parsearFraseDescubiertaHastaAhora = function(){
    var result = "";
    var letras_frase = frase_descubierta_hasta_ahora.split('');
    letras_frase.forEach(function(item,index,arr){
      //alert(item);
      var newChar = '';
      if(item=="/"){
        newChar = '<div class="typo"><span>/</span></div>';
      }else if(item=="_"){
        newChar = '<div class="typo"><span></span></div>';
      }else{
        newChar = '<div class="typo"><span>'+item+'</span></div>';
      }
      result = result + newChar;
    });
    $("#frase_parseada").html(result);
  };

  intentarLetraAhorcado = function(obj){
    var id = obj.id + "";
    var letra = id.replace("key-","");
    var letra_a_intentar = letra;
    if(intentos_ahorcado_actual>0){
      $("#"+id).addClass("used");
      $("#historial_intentos").show();
      if(letras_intentadas.indexOf(letra_a_intentar)>=0){
        //Ya intentó con esa letra
        return false;
      }else{
        //Primer intento con esa letra, la guardo
        letras_intentadas.push(letra_a_intentar);
        $("#historial_intentos_utilizados").append(letra_a_intentar.toUpperCase() + " ");
        $("[name='form_intentos']").val($("#historial_intentos_utilizados").html());
      }
      var aciertos = new Array();
      var letras_frase = frase_ahorcado_actual.split('');
      var acerto_letra = false;
      letras_frase.forEach(function(item,index,arr){
        //item = item.toLowerCase();
        if(item.toLowerCase() == letra_a_intentar.toLowerCase()){
          var acierto = {
                          letra: letra_a_intentar.toLowerCase(),
                          posicion: index
                        }
          aciertos.push(acierto);
          acerto_letra = true;
        }
      });
      aciertos.forEach(function(item,index,arr){
        frase_descubierta_hasta_ahora = frase_descubierta_hasta_ahora.substr(0, item['posicion']) + item['letra'] + frase_descubierta_hasta_ahora.substr(item['posicion'] + 1);
      });
      parsearFraseDescubiertaHastaAhora();
      //$("#frase_parseada").html(frase_descubierta_hasta_ahora);
      $("[name='form_frase_armada']").val(frase_descubierta_hasta_ahora);
      if(!acerto_letra){
        intentos_ahorcado_actual = intentos_ahorcado_actual - 1;
        var intentos_html = "";
        for (i = 0; i < intentos_ahorcado_actual; i++) {
          intentos_html += '<i class="intento"><img src="/sites/default/themes/cpd/img/good.svg"></i>';
        }
        var vidas_perdidas = vidas_comienzo - intentos_ahorcado_actual;
        for (i = 0; i < vidas_perdidas; i++) {
          intentos_html += '<i class="intento"><img src="/sites/default/themes/cpd/img/bad.svg"></i>';
        }
        $("#intentos").html(intentos_html);
        $("#intentos_restantes_value").html(intentos_ahorcado_actual);
        $("[name='form_intentos_restantes_ahorcado']").val(intentos_ahorcado_actual);
      }
      if(frase_descubierta_hasta_ahora.indexOf("_")<0){
        gano = true;
        $("#intentar_letra_input").attr("disabled", true);
        $("#intentar_letra_button").attr("disabled", true);
        /*$("#resultado").show();
        $("#resultado").html("Felicitaciones, lo has logrado!");*/
        //$("#intentos").html("<h3>:)</h3>Presiona 'Siguiente'");
        intentos_ahorcado_actual = 0; //Seteo en 0 para que no se pueda seguir tocando otras teclas
        $("[name='form_resultado_ahorcado']").val(1);
        $("#edit-next").click();
      }
      if(intentos_ahorcado_actual==0){
        $("#intentar_letra_input").attr("disabled", true);
        $("#intentar_letra_button").attr("disabled", true);
        if(!gano){
          /*$("#resultado").show();*/
          //$("#intentos").html("<h3>:(</h3>Presiona 'Siguiente'");
          $("[name='form_resultado_ahorcado']").val(0);
          $("#edit-next").click();
        }
      }
      $("#intentar_letra_input").val('');
    }else{
      return false;
    }
  };

  intentarFraseAhorcado = function(){
    var frase_a_intentar = $("#arriesgar_frase_input").val();
    if(intentos_ahorcado_actual>0){
      $("#historial_intentos").show();
      if(frases_intentadas.indexOf(frase_a_intentar.trim().toUpperCase())>=0){
        //Ya intentó con esa frase
        return false;
      }else{
        //Primer intento con esa letra, la guardo
        frases_intentadas.push(frase_a_intentar.trim().toUpperCase());
        $("#historial_intentos_utilizados").append("'" + frase_a_intentar.trim().toUpperCase() + "' ");
        $("[name='form_intentos']").val($("#historial_intentos_utilizados").html());
      }
      intentos_ahorcado_actual = intentos_ahorcado_actual - 1;
      $("#intentos_restantes_value").html(intentos_ahorcado_actual);
      $("[name='form_intentos_restantes_ahorcado']").val(intentos_ahorcado_actual);
      if(frase_ahorcado_actual.trim().toUpperCase()==frase_a_intentar.trim().toUpperCase()){
        gano = true;
        $("#frase_parseada").html(frase_a_intentar.trim().toUpperCase());
        $("[name='form_frase_armada']").val(frase_a_intentar.trim().toUpperCase());
        $("#arriesgar_frase_input").attr("disabled", true);
        $("#arriesgar_frase_button").attr("disabled", true);
        $("#resultado").show();
        $("#resultado").html("Felicitaciones, lo has logrado!");
        $("[name='form_resultado_ahorcado']").val(1);
      }
      if(intentos_ahorcado_actual==0){
        $("#arriesgar_frase_input").attr("disabled", true);
        $("#arriesgar_frase_button").attr("disabled", true);
        if(!gano){
          $("#resultado").show();
          $("#resultado").html("Se han acabado los intentos, no lo has logrado  :(");
          $("[name='form_resultado_ahorcado']").val(0);
        }
      }
      $("#arriesgar_frase_input").val('');
    }else{
      return false;
    }
  };

})(jQuery);
