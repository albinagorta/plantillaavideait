 <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo URL_DOMINIO_ADMIN; ?>" class="logo"><b>AvideaIT</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <i class="fas fa-align-justify"></i>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <?php  include 'cabezote/notificaciones.php'; ?>
              <?php  include 'cabezote/usuarios.php'; ?>

            </ul>
          </div>
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
              

          <?php include 'cabezote/menu.php'; ?>

        </section>

      </aside>

