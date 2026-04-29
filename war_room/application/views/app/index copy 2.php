<?
include_once("functions/string.func.php");
include_once("functions/date.func.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard | PT PLN Nusantara Power</title>
    <base href="<?=base_url();?>" />

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="assets/bootstrap-3.3.7/docs/examples/starter-template/starter-template.css" rel="stylesheet"> -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <style type="text/css">
      body {
        -webkit-perspective: 2000px;
        perspective: 2000px;
        -webkit-perspective-origin: center;
        perspective-origin: center;
        overflow: hidden;
        background-color: #222222;
        width: 100vw;
        height: 100vh;
    }

    body nav {
        background: none;
        position: relative;
    }

    body nav .button {
        width: 40px;
        height: 40px;
        margin: 0;
        background-color: black;
        border-radius: 50%;
        display: inline-block;
        cursor: pointer;
    }

    body nav .button:nth-child(2) {
        margin-left: 30px;
    }

    body nav #buttons .buttons-navi {
        z-index: 100;
        position: absolute;
        top: 10px;
        margin-left: 10px;
    }

    body nav #buttons .buttons-navi .button {
        width: 40px;
        height: 40px;
    }

    body nav #buttons .buttons-navi .button span {
        color: white;
        font-size: 25px;
        font-weight: 500;
        position: absolute;
    }

    body nav #buttons .buttons-navi .button .button-next {
        top: 8px;
        left: 83px;
    }

    body nav #buttons .buttons-navi .button .button-prev {
        top: 8px;
        left: 8px;
    }

    body nav #buttons .buttons-menu {
        z-index: 100;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    body nav #buttons .buttons-menu .button-wrapper {
        position: relative;
        right: -10px;
        top: 10px;
    }

    body nav #buttons .buttons-menu .button-wrapper span {
        display: block;
        width: 20px;
        height: 5px;
        background-color: white;
        border-radius: 5px;
        position: absolute;
    }

    body nav #buttons .buttons-menu .button-wrapper span:nth-child(1) {
        top: 0px;
    }

    body nav #buttons .buttons-menu .button-wrapper span:nth-child(2) {
        top: 8px;
    }

    body nav #buttons .buttons-menu .button-wrapper span:nth-child(3) {
        top: 16px;
    }

    body nav #menu {
        display: none;
        /*background-color: black;*/
        color: white;
        -webkit-transform-origin: 0% 0%;
        -o-transform-origin: 0% 0%;
        transform-origin: 0% 0%;
        position: absolute;
        z-index: 99;
    }

    body nav #menu ul {
        list-style: none;
        width: 100vw;
        width: auto;
        height: 100vh;
        height: auto;
        -webkit-transform-origin: center;
        -o-transform-origin: center;
        transform-origin: center;
        -webkit-transform: translateY(25vh);
        -o-transform: translateY(25vh);
        transform: translateY(25vh);
        padding-left: 0;

        /*border: 2px solid cyan;*/
        border-left: 2px solid #1693ac;
        margin-top: -130px;
        margin-left: 10px;
        padding-bottom: 10px;
        background-color: rgba(0,0,0,0.9);

        -webkit-border-radius: 40px;
        -webkit-border-top-left-radius: 20px;
        -moz-border-radius: 40px;
        -moz-border-radius-topleft: 20px;
        border-radius: 40px;
        border-top-left-radius: 20px;

        overflow: hidden;
    }

    body nav #menu ul li {
        display: none;
        text-align: center;
        text-transform: uppercase;
        -webkit-transform-origin: left;
        -o-transform-origin: left;
        transform-origin: left;
        margin: 0 auto;
        /*font-size: 40px;*/

        -webkit-transform: translateX(-100vw);
        -o-transform: translateX(-100vw);
        transform: translateX(-100vw);
        cursor: pointer;

        font-size: 14px;
        text-align: inherit;
    }
    body nav #menu ul li a {
        padding: 8px 15px;
        display: block;
        color: rgba(255,255,255,0.6);
        border-bottom: 1px solid rgba(255,255,255,0.4);
    }
    body nav #menu ul li a:hover {
        color: #FFF;
    }

    #pages {
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform-origin: 50% 50% -50vw;
        -o-transform-origin: 50% 50% -50vw;
        transform-origin: 50% 50% -50vw;
        height: 100%;
        width: 100%;
        position: relative;
    }

    #pages section {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        overflow: hidden;
        font-size: 50px;
        margin: auto 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-align-content: center;
        -ms-flex-line-pack: center;
        align-content: center;
    }

    #pages #main {
        background-color: rgba(255, 217, 0, 0.8);
    }
    #pages #penjualan {
        background-color: rgba(255, 69, 0, 0.8);
        -webkit-transform-origin: center;
        -o-transform-origin: center;
        transform-origin: center;
        -webkit-transform: translateZ(-100vw) rotateY(-180deg);
        transform: translateZ(-100vw) rotateY(-180deg);
    }
    #pages #kesiapan-pembangkit {
        -webkit-transform: translateX(50vw) translateZ(-50vw) rotateY(90deg);
        transform: translateX(50vw) translateZ(-50vw) rotateY(90deg);
        background-color: rgba(212, 255, 0, 0.8);
    }

    #pages #about {
        background-color: rgba(255, 69, 0, 0.8);
        -webkit-transform-origin: center;
        -o-transform-origin: center;
        transform-origin: center;
        -webkit-transform: translateZ(-100vw) rotateY(-180deg);
        transform: translateZ(-100vw) rotateY(-180deg);
    }

    #pages #work {
        -webkit-transform: translateX(50vw) translateZ(-50vw) rotateY(90deg);
        transform: translateX(50vw) translateZ(-50vw) rotateY(90deg);
        background-color: rgba(212, 255, 0, 0.8);
    }

    #pages #contact {
        -webkit-transform: translateX(-50vw) translateZ(-50vw) rotateY(-90deg);
        transform: translateX(-50vw) translateZ(-50vw) rotateY(-90deg);
        background-color: rgba(170, 179, 179, 0.8);
    }
    </style>

    <link rel="stylesheet" type="text/css" href="css/gaya.css">
    <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.css">
  </head>

  <body>

    <!-- <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse --
      </div>
    </nav> -->

    <nav>
            <section id="buttons">
              <!-- <article class="buttons-navi">
                <div class="button">
                  <span class="button-prev glyphicon glyphicon-menu-left"></span>
                </div>
                <div class="button">
                  <span class="button-next glyphicon glyphicon-menu-right"></span>
                </div>
              </article> -->
              <article class="buttons-menu">
                <div class="button">
                  <div class="button-wrapper">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                </div>
              </article>
            </section>
            <section id="menu">
              <article class="menu-content">
                <ul>
                  <li class="<? if($pg == "" || $pg == "home"){?>active<? } ?>"><a href="app/index/home">Home</a></li>
                  <li class="<? if($pg == "peta_pembangkit"){?>active<? } ?>"><a href="app/index/peta_pembangkit">Peta Pembangkit</a></li>
                  <li class="<? if($pg == "penjualan"){?>active<? } ?>"><a href="app/index/penjualan">Penjualan</a></li>
                  <li class="<? if($pg == "kesiapan_pembangkit"){?>active<? } ?>"><a href="app/index/kesiapan_pembangkit">Kesiapan Pembangkit</a></li>
                  <li class="<? if($pg == "kinerja_korporat"){?>active<? } ?>"><a href="app/index/kinerja_korporat">Kinerja Korporat</a></li>
                  <li class="<? if($pg == "kinerja_keuangan_korporat"){?>active<? } ?>"><a href="app/index/kinerja_keuangan_korporat">Kinerja Keuangan Korporat</a></li>
                  <li class="<? if($pg == "kpi_keuangan"){?>active<? } ?>"><a href="app/index/kpi_keuangan">KPI Keuangan</a></li>
                  <li class="<? if($pg == "kinerja_proyek"){?>active<? } ?>"><a href="app/index/kinerja_proyek">Kinerja Proyek</a></li>
                </ul>
              </article>
            </section>
          </nav>

            <!-- Fixed navbar -->
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <!-- <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Project name</a>
                </div> -->
                <div id="navbar" class="navbar-collapse collapse">
                  <!-- <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>
                  </ul> -->
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="../navbar/">Default</a></li>
                    <li><a href="../navbar-static-top/">Static top</a></li>
                    <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>

          <div class="container-dashboard">
            <div class="row">
                <div class="col-md-6">
                    &nbsp;
                </div>
                <div class="col-md-6">
                  <div class=" area-info-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="area-periode">
                                Periode
                                <select>
                                    <option>Agustus</option>
                                    <option>Juli</option>
                                </select>
                                <select>
                                    <option>2023</option>
                                    <option>2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="area-ganti-mode">
                                <input type="checkbox" class="checkbox" id="checkbox">
                                <label for="checkbox" class="checkbox-label">
                                    <i class="fa fa-moon-o" aria-hidden="true"></i>
                                    <i class="fa fa-sun-o" aria-hidden="true"></i>
                                    <span class="ball"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 padding-none">
                            <div class="area-akun">
                                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Indra&nbsp;Wijaya&nbsp;(Administrator)
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="area-logout pull-right"><a href="#">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <?=($content ? $content:'')?>  
          </div>
          

          


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="assets/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- VELOCITY -->
    <!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src='//cdn.jsdelivr.net/velocity/1.0.0/velocity.min.js'></script>
    <script type="text/javascript">
            function PageTransitions () {
              const pages = $('#pages');

              const positions = {
                front: 0,
                right: -90,
                back: 180,
                left: 90,
              }

              const getCurrentTransform = () => {
                let currentTransform = pages[0].style.transform.match(/-?\d+/g) || 0;
                currentTransform!==0? currentTransform = parseInt(currentTransform[0]): currentTransform=0;
                return currentTransform;
              }

              const moveCube = (page) => {
                let target = positions[page];
                animateCube(target);
              }

              const changePage = (direction) => {
                let veloIsAnimating = pages.attr('class');
                let end = direction===1? -360: 360;
                let step = direction===1? 90: -90;
                if (!veloIsAnimating) {
                  let current = getCurrentTransform();
                  if (current===end) {
                    pages.velocity(
                      {
                        rotateY:[0],
                      },
                      {
                        duration: 0,
                        complete: () => {
                          current = getCurrentTransform();
                          let target = (current+step);
                          animateCube(target);
                        }
                      },
                    )
                  } else {
                    let target = (current+step);
                    animateCube(target);
                  }
                }
              }

              const animateCube = (target) => {
                pages.velocity(
                  {
                    rotateY:[target],
                  },
                  {
                    duration: 2000,
                    easing: "easeOut",
                  },
                )
              }

              return {
                change: changePage,
                move: moveCube,
              }
            }

          function Navigation (pagestrs) {
            const nav = $('nav');
            const buttons = nav.find('#buttons');
            const menu = nav.find('#menu');
            const buttonsNavi = buttons.find('.buttons-navi');
            const buttonPrev = buttonsNavi.find('.button:nth-child(1)');
            const buttonNext = buttonsNavi.find('.button:nth-child(2)');
            const buttonNextContent = buttonNext.find('.button-next');
            const buttonPrevContent = buttonPrev.find('.button-prev');
            const buttonMenu = buttons.find('.buttons-menu .button');
            const menuItems = menu.find('li');
            const buttonMenuContent = buttonMenu.find('.button-wrapper');
            const topSpan = buttonMenuContent.find('span:nth-child(1)');
            const middleSpan = buttonMenuContent.find('span:nth-child(2)');
            const bottomSpan = buttonMenuContent.find('span:nth-child(3)');
            const spans = [topSpan,middleSpan,bottomSpan];
            
            const windowOnUnload = (fn) => {
              const unload = () => {
                fn()
                window.removeEventListener('unload',unload);
              }
              window.addEventListener('unload',unload);
            };
            
            const animateChangePageButton = () => {
              const animateContent = (event) => {
                event.data.object.velocity(
                  {
                    scale: [1,0],
                  },
                  {
                    duration: 1000,
                    easing: 'spring',
                  }
                )
              }

              buttonNext.on('mouseenter', {object: buttonNextContent}, animateContent);
              windowOnUnload(() => {
                buttonNext.off('mouseenter', animateContent);
              });

              buttonPrev.on('mouseenter', {object: buttonPrevContent}, animateContent);
              windowOnUnload(() => {
                buttonPrev.off('mouseenter', animateContent);
              });
            }
            
            const handleNextPageClick = () => {
              const buttonNext = buttons.find('.buttons-navi .button:nth-child(2)');
              const clickEvent = () => {
                pagestrs.change(0);
              }
              buttonNext.on('click', clickEvent);
              windowOnUnload(() => {
                buttonNext.off('click', clickEvent);
              })
            }

            const handlePrevPageClick = () => {
              const buttonPrev = buttons.find('.buttons-navi .button:nth-child(1)');
              const clickEvent = () => {
                pagestrs.change(1);
              }
              buttonPrev.on('click', clickEvent);
              windowOnUnload(() => {
                buttonPrev.off('click', clickEvent);
              })
            }
            
            const animateManuButton = () => {
              topSpan.velocity(
                {
                  rotateZ: '135deg',
                  top: '12px',
                },
                {
                  duration: 300,
                }
              );
              middleSpan.velocity(
                {
                  right: '40px',
                  opacity: 0,
                },
                {
                  duration: 300,
                }
              );
              bottomSpan.velocity(
                {
                  rotateZ: '-135deg',
                  top: '12px',
                },
                {
                  duration: 300,
                }
              );
            }
            
            const reverseManuButtonAnimation = () => {
              spans.forEach((span)=>{
                span.velocity('reverse');
              });
            }
            
            const menuIn = () => {
              buttonsNavi.hide();
              menu.show();
              menu.velocity(
                {
                  translateY: [0,-180],
                  scale: [1,0],
                  opacity: [1,0],
                },
                {
                  duration: 2000,
                  easing: "spring",
                }
              )
            }

            const menuOut = () => {
              buttonsNavi.show();
              menu.velocity(
                "reverse",
                {
                  duration: 1000,
                  easing: "spring",
                  complete: () => {
                    menu.hide();
                  }
                }
              );
            }
            
            const menuItemsIn = () => {
              let delay = 200;
              menuItems.each((key,item) => {
                let it = $(item);
                it.show();
                it.velocity(
                  {
                    translateX: ["0vw","-100vw"],
                    backgroundColorAlpha: [0,1],
                  },
                  {
                    duration: 2000,
                    easing: "spring",
                    delay: delay,
                  }
                )
                delay+=200;
              });
            }
            
            const naviInSeq = () =>{
              const seq = [
                animateManuButton,
                menuIn,
                menuItemsIn,
              ];
              seq.forEach((anim)=>{
                anim();
              });
            }

            const naviOutSeq = () => {
              const seq = [
                reverseManuButtonAnimation,
                menuOut,
              ];
              seq.forEach((anim)=>{
                anim();
              });
            }
            
            const handleMenuButtonClick = () => {
              const handleToggle = () => {
                let veloIsAnimating = menu.attr('class');
                if(!veloIsAnimating) {
                  let opacity = parseInt(middleSpan.css('opacity'));
                  if(opacity===1) {
                    naviInSeq();
                  } else {
                    naviOutSeq();
                  }
                }
              }
              buttonMenu.on('click',handleToggle);
              windowOnUnload(()=>{
                buttonMenu.off('click',handleToggle);
              });
            }
            
            const menuItemClickSeq = [
              reverseManuButtonAnimation,
              menuOut,
              pagestrs.move,
            ];
            
            const handleManuItemClick = () => {
              const clickEvent = (id) => {
                menuItemClickSeq.forEach((anim)=>{
                  anim(id);
                });
              };

              menuItems.each((key,item) => {
                let it = $(item);
                it.on('click', ()=>{
                  clickEvent(it[0].id);
                });
                windowOnUnload(()=>{
                  it.off('click');
                });
              });
            }
            
            return {
              animateChangePageButton: animateChangePageButton,
              nextPage: handleNextPageClick,
              prevPage: handlePrevPageClick,
              menuButtonClick: handleMenuButtonClick,
              menuItemClick: handleManuItemClick,
            }
          }

          function Apx (navigation, pagesTransition) {
            const pagesTrs = new pagesTransition();
            const navi = new navigation(pagesTrs);
            
            const domOnLoad = (fn) => {
              const unload = () => {
                window.removeEventListener('DOMContentLoaded',fn);
                window.removeEventListener('unload',unload);
              }
              window.addEventListener('DOMContentLoaded',fn);
              window.addEventListener('unload',unload);
            };
            
            const init = () => {
              const onInit = Object.values(navi);
              onInit.forEach((fn)=>{
                domOnLoad(fn);
              });
            }
            return {
              init: init,
            }
          }

          const app = new Apx(Navigation, PageTransitions);
          app.init();

          </script>

          <!-- GRAND PRO OPL -->
          <!-- Bootstrap CSS -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/bootstrap.min.css" > -->
          <!-- Icon -->
          <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/fonts/line-icons.css">
          <!-- Slicknav -->
          <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/slicknav.css">
          <!-- Nivo Lightbox -->
          <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/nivo-lightbox.css" >
          <!-- Animate -->
          <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/animate.css">
          <!-- Main Style -->
          <!-- <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/main.css"> -->
          <!-- Responsive Style -->
          <link rel="stylesheet" type="text/css" href="lib/grand-pro-opl/assets/css/responsive.css">


          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <!-- <script src="lib/grand-pro-opl/assets/js/jquery-min.js"></script> -->
          <script src="lib/grand-pro-opl/assets/js/popper.min.js"></script>
          <!-- <script src="lib/grand-pro-opl/assets/js/bootstrap.min.js"></script> -->
          <script src="lib/grand-pro-opl/assets/js/jquery.countdown.min.js"></script>
          <script src="lib/grand-pro-opl/assets/js/jquery.nav.js"></script>
          <script src="lib/grand-pro-opl/assets/js/jquery.easing.min.js"></script>
          <script src="lib/grand-pro-opl/assets/js/wow.js"></script>
          <script src="lib/grand-pro-opl/assets/js/jquery.slicknav.js"></script>
          <script src="lib/grand-pro-opl/assets/js/nivo-lightbox.js"></script>
          <script src="lib/grand-pro-opl/assets/js/main.js"></script>
          <script src="lib/grand-pro-opl/assets/js/form-validator.min.js"></script>
          <script src="lib/grand-pro-opl/assets/js/contact-form-script.min.js"></script>
          <!-- <script src="lib/grand-pro-opl/assets/js/map.js"></script> -->
          <!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script> -->

          <!-- GANTI MODE -->
          <script type="text/javascript">
              const checkbox = document.getElementById("checkbox")
              checkbox.addEventListener("change", () => {
                  // alert("hai");
                  document.body.classList.toggle("dark")
              })
          </script>

  </body>
</html>

<!------------------------------------------------------------------------------------->

