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

        echo "</ul>";
    }
}




/*<ul class="nav navbar-nav">
                <li class="active"><a href="<?= base_url(); ?>">Inicio <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nosotros<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">La Empresa</a></li>
                        <li><a href="#">Misión - Visión</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Estructura Organizacional</a></li>
                    </ul>
                </li>
            </ul>*/

