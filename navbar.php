<html>
<nav>

    <div class="nav-wrapper red ">
      <a style="text-decoration: none;" class="brand-logo">&nbsp;&nbsp;Área del Usuario</a>
      <ul id="nav-mobile" style="text-decoration: none;" class="right hide-on-med-and-down">
<li><a href="./view-notify.php" style="text-decoration: none;"><i class="fas fa-envelope"></i> Notificaciones (<?php echo $contador; ?>)</a></li>
        <li><a class='dropdown-trigger' href='#' style="text-decoration: none;" data-target='dropdown1'>Ajustes de Usuario <i class="fas fa-caret-down"></i></a></li>
        <li><a href="../cerrarsesion.php" style="text-decoration: none;"><i class="fas fa-power-off"></i></a></li>
      </ul>
    </div>
  </nav>


  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="ajustes-usuario.php"><i class="fas fa-wrench"></i>Ajustes</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="../inicio.php"><i class="fas fa-tools"></i>Panel</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./area-usuarios.php"><i class="fas fa-at"></i> Inicio</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="./admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="../cerrarsesion.php"><i class="fas fa-power-off"></i> Logout</a></li>
  </ul>
</html>