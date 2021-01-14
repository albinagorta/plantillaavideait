<ul class="sidebar-menu">
<li class="header">Navegacion</li>
<?php 
  $menu = array(
    '' => '<a href="'.URL_DOMINIO_ADMIN.'">
      <i class="fa fa-laptop"></i><span>Dashboard</span> </a>',

     'clientes' => '<a href="'.URL_DOMINIO_ADMIN.'clientes"><i class="fas fa-users"></i> <span>Clientes</span></a>',

     'comercio' => '<a href="'.URL_DOMINIO_ADMIN.'comercio"><i class="fas fa-dumpster"></i> <span>Comercio</span></a>',

     'productos' => '<a href="'.URL_DOMINIO_ADMIN.'productos"><i class="fab fa-product-hunt"></i> <span>Productos</span></a>',

     'perfiles' => '<a href="'.URL_DOMINIO_ADMIN.'perfiles"><i class="fas fa-unlock-alt"></i> <span>Perfiles</span></a>',
     'ventas' => '<a href="'.URL_DOMINIO_ADMIN.'ventas"><i class="fas fa-shopping-cart"></i> <span>Ventas</span></a>');

  foreach ($menu as $key => $val) {
            $url[0]==$key?$se='class="active treeview"':$se='';;
             echo '<li '.$se.'>
             '.$val.'
                   </li>';
  }

 ?>
 </ul>


