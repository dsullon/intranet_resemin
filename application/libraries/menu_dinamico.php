<?php

class Menu_dinamico {
    
    function __construct()
    {
        $this->ci =& get_instance(); 
    }
    
    function display_children($parent, $level) 
    {
        $query = $this->ci->db->query("SELECT a.idMenu, a.nombre, a.url, a.publicado, IFNULL( Deriv1.Count, 0 ) AS Count FROM  `menu` a 
            LEFT OUTER JOIN (SELECT idPadre, COUNT( * ) AS Count FROM  `menu` GROUP BY idPadre) Deriv1 ON a.idMenu = Deriv1.idPadre 
            WHERE a.idPadre =" . $parent);

        
        foreach ($query->result() as $row)
        {
             if ($row->Count > 0) 
             {
                echo "<li class='dropdown'>";
                    echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>" . $row->nombre . "<span class='caret'></span></a>";
                    echo "<ul class='dropdown-menu'>";
                        $this->display_children($row->idMenu, $level + 1);
                    echo "</ul>";
                echo "</li>";
            } elseif ($row->Count==0) {
                echo "<li><a href='pagina/" . $row->idMenu . "'>" . $row->nombre . "</a></li>";
            } else;
        }
    }

    function construir_menu()
    {
        echo "<nav class='navbar navbar-default'>";
            echo "<div class='container-fluid'>";
                echo "<div class='navbar-header'>";
                    echo "<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>";
                        echo "<span class='sr-only'>Toggle navigation</span>";
                        echo "<span class='icon-bar'></span>";
                        echo "<span class='icon-bar'></span>";
                        echo "<span class='icon-bar'></span>";
                    echo "</button>";
                    echo "<a class='navbar-brand' href='".base_url()."'><img src='".base_url()."img/logo-resemin.png' alt='Resemin S.A.'></a>";
                echo "</div>";

                echo "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>";
                    echo "<ul class='nav navbar-nav'>";
                        $this->display_children(0,1);
                    echo "</ul>";
                    $this->ci->db->where('idUsuario',$this->ci->session->userdata('usuario'));
                    $query = $this->ci->db->get('usuarios');
                    $usuario = $query->result()[0];
                    echo "<ul class='nav navbar-nav pull-right'>";
                        echo "<li class='dropdown'>";
                            echo "<a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>";
                                echo "<img src='".$usuario->urlAvatar."' class='img-circle profile-img'>";
                                echo ($usuario->nombres.' '.$usuario->apellidoPaterno.' '.$usuario->apellidoMaterno);
                                echo "<span class='caret'></span>";
                            echo "</a>";
                            echo "<ul class='dropdown-menu'>";
                                echo "<li>";
                                    echo "<a href='#'>Editar perfil</a>";
                                echo "</li>";
                                if($this->ci->session->userdata('nivel')==1)
                                {
                                    echo "<li>";
                                        echo "<a href='".base_url()."admin/home'>Administrar datos</a>";
                                    echo "</li>";
                                }
                                echo "<li role='separator' class='divider'></li>";
                                echo "<li>";
                                    echo "<a href='".base_url()."login/logout'>Cerrar sesión</a>";
                                echo "</li>";
                            echo "</ul>";
                        echo "</li>";
                    echo "</ul>";
                echo "</div>";
            echo "</div>";
        echo "</nav>";
    }

    function menu_admin()
    {
        $this->ci->db->where('idUsuario',$this->ci->session->userdata('usuario'));
        $query = $this->ci->db->get('usuarios');
        $usuario = $query->result()[0];

        echo"<div class='profile-sidebar'>";
            echo"<div class='profile-userpic'>";
                echo"<img src='".$usuario->urlAvatar."' class='img-responsive' alt=''>";
            echo"</div>";
            echo"<div class='profile-usertitle'>";
                echo"<div class='profile-usertitle-name'>";
                    echo ($usuario->nombres.' '.$usuario->apellidoPaterno.' '.$usuario->apellidoMaterno);
                echo"</div>";
            echo"</div>";
            echo"<div class='profile-usermenu'>";
                echo"<ul class='nav'>";
                    echo"<li>";
                        echo"<a href='".base_url()."admin/menu'>";
                        echo"<i class='glyphicon glyphicon-tasks'></i>Navegación</a>";
                    echo"</li>";
                    echo"<li>";
                        echo"<a href='".base_url()."admin/pagina'>";
                        echo"<i class='glyphicon glyphicon-file'></i>Páginas</a>";
                    echo"</li>";
                    echo"<li>";
                        echo"<a href='#'>";
                        echo"<i class='glyphicon glyphicon-bullhorn'></i>Publicaciones</a>";
                    echo"</li>";
                    echo"<li>";
                        echo"<a href='".base_url()."'>";
                        echo"<i class='glyphicon glyphicon-home'></i>Inicio</a>";
                    echo"</li>";
                echo"</ul>";
            echo"</div>";
        echo"</div>";
    }
}