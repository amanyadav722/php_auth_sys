<?php

session_start();

if(!isset($_SESSION['loggedin'])){
  echo('Vous devez vous connecter dabord!');
  header('refresh:2;url=Connection.php');
  exit();
}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mon Compte</title>
		<link href="style/home.css" rel="stylesheet" type="text/css">
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://use.fontawesome.com/releases/v5.0.8/js/all.js'></script>		</head>
	</head>
  <body class="sidebar-is-reduced">
    <header class="l-header">
      <div class="l-header__inner clearfix">
        <div class="c-header-icon js-hamburger">
          <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
        </div>

        <div class="c-search">
          <input class="c-search__input u-input" placeholder="Search..." type="text"/>
        </div>
        <div class="c-header-icon has-dropdown"><span class="c-badge c-badge--red c-badge--header-icon animated swing">1</span><i class="fa fa-bell"></i>
          <div class="c-dropdown c-dropdown--notifications">
            <div class="c-dropdown__header"></div>
            <div class="c-dropdown__content"></div>
          </div>
        </div>

        <div class="header-icons-group">
          <div class="c-header-icon basket"><span class="c-badge c-badge--blue c-badge--header-icon animated swing">2</span><i class="fa fa-medkit" aria-hidden="true"></i></div>
          <div class="logoutbtn"><a href="logout.php"><button>Déconnection</button></a></div>
        </div>

      </div>
    </header>
    <div class="l-sidebar">
      <div class="logo">
        <div class="logo__txt">MSPR</div>
      </div>
      <div class="l-sidebar__content">
        <nav class="c-menu js-menu">
          <ul class="u-list">
            <li class="c-menu__item is-active" data-toggle="tooltip" title="Mes Rendez-vous">
              <div class="c-menu__item__inner"><i class="fa fa-calendar" aria-hidden="true"></i>
                <div class="c-menu-item__title"><span>Mes Rendez-vous</span></div>
              </div>
            </li>
           
            <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Mes Documents">
              <div class="c-menu__item__inner"><i class="fa fa-book" aria-hidden="true"></i>
                <div class="c-menu-item__title"><span>Mes Documents</span></div>
              </div>
            </li>
            <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Médecin">
              <div class="c-menu__item__inner"><i class="fa fa-user-md" aria-hidden="true"></i>
                <div class="c-menu-item__title"><span>Médecin</span></div>
              </div>
            </li>
            <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Paramètres">
              <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
                <div class="c-menu-item__title"><span>Paramètres</span></div>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </body>
  <main class="l-main">
    <div class="content-wrapper content-wrapper--with-bg">
      <h1 class="page-title">Compte Mspr</h1>
      <div class="page-content">Bienvenue, <em><?=$_SESSION['name']?>!</em></div>
    </div>
  </main>
  <!-- partial -->
   
  <script>
      let Dashboard = (() => {
  let global = {
    tooltipOptions: {
      placement: "right" },

    menuClass: ".c-menu" };


  let menuChangeActive = el => {
    let hasSubmenu = $(el).hasClass("has-submenu");
    $(global.menuClass + " .is-active").removeClass("is-active");
    $(el).addClass("is-active");

    // if (hasSubmenu) {
    // 	$(el).find("ul").slideDown();
    // }
  };

  let sidebarChangeWidth = () => {
    let $menuItemsTitle = $("li .menu-item__title");

    $("body").toggleClass("sidebar-is-reduced sidebar-is-expanded");
    $(".hamburger-toggle").toggleClass("is-opened");

    if ($("body").hasClass("sidebar-is-expanded")) {
      $('[data-toggle="tooltip"]').tooltip("destroy");
    } else {
      $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
    }

  };

  return {
    init: () => {
      $(".js-hamburger").on("click", sidebarChangeWidth);

      $(".js-menu li").on("click", e => {
        menuChangeActive(e.currentTarget);
      });

      $('[data-toggle="tooltip"]').tooltip(global.tooltipOptions);
    } };

})();

Dashboard.init();
  </script>

		  </body>
</html>