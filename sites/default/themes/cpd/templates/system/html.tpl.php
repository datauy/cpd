<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $html_attributes:  String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: An array of attribute values for the HTML element.
 *   It is flattened into a string within the variable $html_attributes.
 * - $body_attributes:  String of attributes for the BODY element. It can be
 *   manipulated through the variable $body_attributes_array from preprocess
 *   functions.
 * - $body_attributes_array: An array of attribute values for the BODY element.
 *   It is flattened into a string within the variable $body_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup templates
 */
  $url_begin = "http://".$_SERVER["HTTP_HOST"];
  $base_url = "/sites/default/themes/cpd";
?><!DOCTYPE html>
<html<?php print $html_attributes;?><?php print $rdf_namespaces;?>>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Centros Educativos Promotores de Derechos</title>
  <meta name="description" content="La Estrategia CPD busca fortalecer y generar nuevas prácticas en promoción de derechos humanos en centros de educación media. Te invitamos a aprender a través de juegos y material audiovisual, y ofrecemos material para docentes y centros educativos.">
  <link rel="icon" type="image/x-icon" href="<?php echo $base_url; ?>/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:url"	content="<?php print $url_begin; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Centros Educativos Promotores de Derechos" />
  <meta property="og:description" content="La Estrategia CPD busca fortalecer y generar nuevas prácticas en promoción de derechos humanos en centros de educación media. Te invitamos a aprender a través de juegos y material audiovisual, y ofrecemos material para docentes y centros educativos." />
  <meta property="og:image" content="<?php print $url_begin . $base_url . '/img/sharefacebook.png'; ?>" />
  <link rel="stylesheet" href="/sites/all/modules/views/css/views.css"/>
  <link rel="stylesheet" href="/sites/all/libraries/leaflet/leaflet.css"/>
  <link rel="stylesheet" href="/sites/all/modules/ip_geoloc/css/ip_geoloc_leaflet_markers.css"/>
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main_cpd.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/css/ytv.css">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Poppins" rel="stylesheet">
  <?php print $scripts; ?>
  <script src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflmgpyWO/www-widgetapi.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/js/ytv.js"></script>


<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121365297-1');
</script>
  <script type="text/javascript">
    jQuery( document ).ready(function() {
      jQuery( "div.centro p a" ).click(function(){
          clickCentroDesdeListaMapa(this.text);
        });
      jQuery( "div.centro p a" ).css( 'cursor', 'pointer' );
    });

    function clickCentroDesdeListaMapa(centroNombre){
      Drupal.settings.leaflet[0].lMap.eachLayer(function(layer){
          var nombre = layer.options.title;
          if(nombre==centroNombre){
            Drupal.settings.leaflet[0].lMap.setView(layer._latlng);
            layer.fire('click');
          }
      });
    };
  </script>
</head>
<body<?php print $body_attributes; ?>>
  <!--<div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>-->
  <?php /*print $page_top;*/ ?>
  <?php print $page; ?>
  <?php /*print $page_bottom;*/ ?>
  <!--<script src="<?php //echo $base_url; ?>/js/vendor/jquery-1.11.2.min.js"></script>-->
  <script src="<?php echo $base_url; ?>/js/buzz.js"></script>
  <script src="<?php echo $base_url; ?>/js/main.js"></script>
  <script src="<?php echo $base_url; ?>/js/snap.svg-min.js"></script>
  <script src="<?php echo $base_url; ?>/js/classie.js"></script>
  <script src="<?php echo $base_url; ?>/js/main3.js"></script>
  <script src="<?php echo $base_url; ?>/js/modalEffects.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/js/custom.js"></script>
</body>
</html>
