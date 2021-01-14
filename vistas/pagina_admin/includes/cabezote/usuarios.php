<!-- usuario -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                   <?php 
                   echo '<img src="'.URL_DOMINIO.'img/user2-160x160.jpg" class="user-image" alt="User Image"/>';
                    ?>
                  <span class="hidden-xs"><?php echo $_SESSION['USER_NOMBRE']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php 
                   echo '<img src="'.URL_DOMINIO.'img/user2-160x160.jpg" class="img-circle" alt="User Image" />';                  
                     ?>
                    
                    <p>
                      <?php echo $_SESSION['USER_NOMBRE']; ?>
                     
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo URL_DOMINIO_ADMIN; ?>salir.php" class="btn btn-danger btn-flat" style="background: #dd4b39;"><i class="fa fa-clock"></i> Salir</a>
                    </div>
                  </li>
                </ul>
              </li>