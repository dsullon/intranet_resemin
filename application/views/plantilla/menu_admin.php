<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="profile-sidebar">
  <!-- SIDEBAR USERPIC -->
  <div class="profile-userpic">
    <img src="<?=$usuario->result()[0]->urlAvatar;?>" class="img-responsive" alt="">
  </div>
  <!-- END SIDEBAR USERPIC -->
  <!-- SIDEBAR USER TITLE -->
  <div class="profile-usertitle">
    <div class="profile-usertitle-name">
      <?=$usuario->result()[0]->nombres.' '.$usuario->result()[0]->apellidoPaterno.' '.$usuario->result()[0]->apellidoMaterno ?>
    </div>
    <!--<div class="profile-usertitle-job">
      Developer
    </div>-->
  </div>
  <!-- END SIDEBAR USER TITLE -->
  <!-- SIDEBAR MENU -->
  <div class="profile-usermenu">
    <ul class="nav">
      <li>
        <a href="<?= base_url() ?>menu">
        <i class="glyphicon glyphicon-tasks"></i>
        Navegación </a>
      </li>
      <li>
        <a href="<?= base_url() ?>admin/pagina">
        <i class="glyphicon glyphicon-file"></i>
        Páginas </a>
      </li>
      <li>
        <a href="#">
        <i class="glyphicon glyphicon-bullhorn"></i>
        Publicaciones </a>
      </li>
    </ul>
  </div>
  <!-- END MENU -->
</div>