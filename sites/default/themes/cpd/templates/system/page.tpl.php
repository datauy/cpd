<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
 $base_url = "/sites/default/themes/cpd";
?>
<div class="page_transition">
</div>
        <div class="header-container">
                    <header class="wrapper clearfix">
                        <a class="logo" href="/"><img src="<?php echo $base_url; ?>/img/logo.svg" title="Centro Promotores de Derechos"></a>
                        <button class="menu-button" id="open-button">Open Menu</button>
                        <?php if(isset($node) && $node->title!="Aprendé y compartí" && $node->title!="Docentes" && $node->title!="Centros participantes" && ($node->type=="eje_tematico"||$node->type=="page")){ ?>
                          <!--<a style="z-index: 999999;" href="#" onclick="window.history.back();" class="button">Volver</a>-->
                          <a style="z-index: 999999;" href="/" class="button">Volver</a>
                        <?php } ?>
                        <div style="z-index: 999999;" class="menu-wrap">
                        <nav class="menu">
                          <ul>
                          <li><a class="active" href="/">Inicio</a></li>
                          <li><a href="/localizacion">Centros participantes</a></li>
                          <li><a href="/centros-promotores-de-derechos">Centros Promotores de Derechos</a></li>
                          <li><a href="/aprende-y-comparti">Aprendé y compartí</a></li>
                          <li><a href="/docentes">Docentes</a></li>
                          <li><a href="/sobre-nosotros">Sobre la plataforma</a></li>
                         </ul>
                         <?php
                           global $user;
                           if ($user && in_array('CPD_Admin', $user->roles)) {
                         ?>
                         <br/>Trivias:
                         <ul>
                            <li><a href="/trivias">Trivias disponibles</a></li>
                            <li><a href="/node/add/trivia">Crear nueva trivia</a></li>
                            <li><a href="/trivias_contestadas">Trivias contestadas</a></li>
                            <li><a href="/user/logout">Cerrar sesión</a></li>
                          </ul>
                          <br/>Preguntas / Juegos:
                          <ul>
                            <li><a href="/descubre-la-palabra">Descubre la palabra</a></li>
                            <li><a href="/multiple-opci-n">Multiple opción</a></li>
                            <li><a href="/verdadero_falso">Verdadero - Falso</a></li>
                          </ul>
                         <?php } ?>
                        </nav>
                        <button class="close-button" id="close-button">Close Menu</button>
                        <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
                                <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
                            </svg>
                        </div>
                    </div>
                    </header>
                </div>

                <?php if ($is_front){ ?>
                  <div class="centered">
                    <div class="wrapper clearfix">
                        <section class="home">
                            <h2>Centros Promotores de Derechos</h2>
                            <a style="z-index: 1000;" href="/aprende-y-comparti" id="btn_aprender" class="button">
                                Aprender
                            </a>
                             <a style="z-index: 1000;" href="/trivia" id="btn_jugar" class="button">
                                Jugar
                            </a>
                            <a style="z-index: 1000;" href="/centros-promotores-de-derechos" class="button only_mobile">
                                Conocer la propuesta
                            </a>
                             <a style="z-index: 1000;" href="/docentes" class="button only_mobile">
                                Docentes
                            </a>
                        </section>
                    </div> <!-- #main -->
                </div> <!-- #main-container -->
                 <div class="isdesktop home_bulding">
                    <img src="<?php echo $base_url; ?>/img/home_bulding.png">
                </div>
                <?php }else{ ?>
                    <div class="main-container centered">
                      <div class="main wrapper clearfix">
                          <?php if(isset($node) && $node->title=="Aprendé y compartí"){?>
                            <?php //include $base_url.'/templates/articles/aprende_y_comparti.tpl.php'; ?>
                            <section class="select_topic">
                              <h2>Aprendé y compartí</h2>
                              <div class="topic" onclick="window.location='/discapacidad'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/discapacidad.svg">
                                </div>
                                <p>Discapacidad</p>
                              </div>
                               <div class="topic" onclick="window.location='/itinerarios'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/itinerarios.svg">
                                </div>
                                <p>Itinerarios</p>
                              </div>
                               <div class="topic" onclick="window.location='/convivencia'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/convivencia.svg">
                                </div>
                                <p>Convivencia</p>
                              </div>

                              <div class="topic" onclick="window.location='/diversidad_sexual'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/diversidad.svg">
                                </div>
                                <p>Diversidad Sexual</p>
                              </div>

                              <div class="topic" onclick="window.location='/genero'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/genero.svg">
                                </div>
                                <p>Género</p>
                              </div>
                              <div class="topic" onclick="window.location='/pertenencia'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/pertenencia.svg">
                                </div>
                                <p>Pertenencias</p>
                              </div>
                              <div class="topic" onclick="window.location='/salud_adolescente'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/salud.svg">
                                </div>
                                <p>Salud Adolescente</p>
                              </div>
                              <div class="topic" onclick="window.location='/etnico_racial'">
                                <div class="inner_topic">
                                    <img src="<?php echo $base_url; ?>/img/etnico.svg">
                                </div>
                                <p>Étnico Racial</p>
                              </div>
                            </section>

                            <?php } else if(isset($node) && $node->title=="Docentes"){?>
                              <?php //include $base_url.'/templates/articles/aprende_y_comparti.tpl.php'; ?>
                              <section class="select_topic">
                                <h2>Material para docentes</h2>
                                <div class="topic" onclick="window.location='/discapacidad?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/discapacidad.svg">
                                  </div>
                                  <p>Discapacidad</p>
                                </div>
                                 <div class="topic" onclick="window.location='/itinerarios?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/itinerarios.svg">
                                  </div>
                                  <p>Itinerarios</p>
                                </div>
                                 <div class="topic" onclick="window.location='/convivencia?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/convivencia.svg">
                                  </div>
                                  <p>Convivencia</p>
                                </div>

                                <div class="topic" onclick="window.location='/diversidad_sexual?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/diversidad.svg">
                                  </div>
                                  <p>Diversidad Sexual</p>
                                </div>

                                <div class="topic" onclick="window.location='/genero?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/genero.svg">
                                  </div>
                                  <p>Género</p>
                                </div>
                                <div class="topic" onclick="window.location='/pertenencia?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/pertenencia.svg">
                                  </div>
                                  <p>Pertenencias</p>
                                </div>
                                <div class="topic" onclick="window.location='/salud_adolescente?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/salud.svg">
                                  </div>
                                  <p>Salud Adolescente</p>
                                </div>
                                <div class="topic" onclick="window.location='/etnico_racial?docentes=1'">
                                  <div class="inner_topic">
                                      <img src="<?php echo $base_url; ?>/img/etnico.svg">
                                  </div>
                                  <p>Étnico Racial</p>
                                </div>
                              </section>
                          <?php }else if(isset($node) && $node->title=="Centros participantes"){ ?>
                            <?php print render($page['content']); ?>
                            <script type="text/javascript">
                              document.getElementById("block-system-main").className = 'centros_mapa block block-system clearfix';
                            </script>
                          <?php }else if(isset($node) && $node->type=="eje_tematico"){ ?>
                            <script type="text/javascript">
                              document.body.className = 'white';
                            </script>
                            <?php print render($page['content']); ?>
                          <?php }else if(isset($node) && $node->type=="page"){ ?>
                            <script type="text/javascript">
                              document.body.className = 'white';
                            </script>
                            <?php print render($page['content']); ?>
                          <?php }else{ ?>
                            <?php print render($page['content']); ?>
                         <?php } ?>
                      </div> <!-- #main -->
                    </div> <!-- #main-container -->
                <?php } ?>

                <div class="footer-container">
                    <footer class="wrapper">

                        <a style="z-index: 99999;" target="_blank" href="http://www.mides.gub.uy/"><img src="<?php echo $base_url; ?>/img/mideslogo.png"></a>
                        <a style="z-index: 99999;" target="_blank" href="http://www.datauy.org/"><img src="<?php echo $base_url; ?>/img/datalogo.png"></a>
                        <?php if ($title=="JUGAR"){ ?>
                          <button style="z-index: 99999;" class="md-trigger" data-modal="quit">Salir</button>
                        <?php }else{ ?>
                          <button onclick="window.location='/centros-promotores-de-derechos';" style="z-index: 99999;">Conocer la propuesta</button>
                        <?php } ?>
                        <?php if($is_front){ ?>
                          <button style="z-index: 99999;" onclick="window.location='/docentes'">Docentes</button>
                        <?php } ?>

                    </footer>
                </div>

                <div class="animated_bg" class="isdesktop">
                    <div class="cloud_one"><img src="<?php echo $base_url; ?>/img/cloud.png"></div>
                    <div class="cloud_three"><img src="<?php echo $base_url; ?>/img/cloud.png"></div>
                    <div class="cloud_two"><img src="<?php echo $base_url; ?>/img/cloud.png"></div>
                </div>


               <!--<div class="md-modal md-effect-3" id="modal-3">
                    <div class="md-content">
                        <h3>La Propuesta</h3>
                        <p>La Estrategia de Centros Educativos Promotores de Derechos (CPD) es una propuesta de la Dirección Nacional de Promoción Sociocultural (DNPSC) del MIDES que busca complementar acciones con la Dirección de Derechos Humanos de CODICEN y los organismos centrales de la ANEP, sumando a otras instituciones como el MSP, el MEC y la UDELAR.<br><br>
        Tiene por objetivo fortalecer y generar nuevas prácticas en promoción de derechos humanos en centros de educación media.<br><br> Para ello se propone trabajar con los diversos colectivos del centro educativo: estudiantes, docentes, equipos educativos y de dirección, familias y comunidades, a partir de actividades con perspectiva de derechos humanos que contribuyan al carácter inclusivo y constructor de democracia en cada centro de estudios. Se propone trabajar en diferentes componentes temáticos: género, diversidad sexual, étnico-racial, salud adolescente, discapacidad, pertenencias, convivencia, itinerarios, trayectorias y acompañamiento socioeducativo, articulando con los diversos Institutos del MIDES y con organismos involucrados en la estrategia de CPD.</p>
                            <button class="button md-close">Cerrar</button>
                    </div>
                </div>-->


                <div class="md-modal md-effect-3" id="quit">
                    <div class="md-content">
                        <h3>¿Quieres salir?</h3>
                        <p>Si presionar "Salir" abadonás el progreso de tu partida, de lo contrario presiona "Volver" para continuar</p>
                            <button onclick="window.location = '/';" class="button">Salir</button>
                            <button class="button md-close">Volver</button>
                    </div>
                </div>

                <div class="md-overlay"></div><!-- the overlay element -->
                <audio id="bg_audio"></audio>
