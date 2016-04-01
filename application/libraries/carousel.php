<?php

class Carousel {
    
    function __construct()
    {
        $this->ci =& get_instance(); 
    }
    
    function crearCarousel()
    {
        $this->ci->load->model('post_model');
        $query=$this->ci->post_model->listarUltimos();
        /*-- Fila --*/
        echo'<div class="row">';
            /*-- Carousel --*/
            echo'<div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">';
                if(!$query){
                    /*---- Indicators --*/
                    echo '<ol class="carousel-indicators">';
                        echo '<li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>';
                    echo '</ol>';
                    /*-- Fin Indicators*/
                    
                    /*-- Wrapper for slides --*/
                    echo '<div class="carousel-inner">';
                        echo '<div class="item active">';
                            echo '<img src="'.base_url().'img/resemin.jpg" />';
                            echo '<div class="carousel-caption">';
                                echo '<h1 class="carousel-caption-header">Resemin S.A.</h1>';
                                echo '<p class="carousel-caption-text hidden-sm hidden-xs">';
                                    echo 'INNOVADORAS PLATAFORMAS SUBTERRÁNEAS DE PERFORACIÓN PRODUCTIVAS, FUERTES, SIMPLES Y VERSÁTILES QUE OFRECEN EL MEJOR RETORNO DE SU INVERSIÓN.';
                                echo ' </p>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    /*-- Fin Wrapper for slides --*/
                }
                else{
                    $fila=0;
                    /*---- Indicators --*/
                    echo '<ol class="carousel-indicators">';
                    foreach ($query->result() as $row)
                    {
                        if($fila==0){
                            echo '<li data-target="#transition-timer-carousel" data-slide-to="'.$fila.'" class="active"></li>';
                        }
                        else{
                            echo '<li data-target="#transition-timer-carousel" data-slide-to="'.$fila.'"></li>';
                        }
                        $fila++; 
                    }
                    echo '</ol>';
                    /*-- Fin Indicators*/
                    $fila=0;
                    /*-- Wrapper for slides --*/
                    echo '<div class="carousel-inner">';
                        foreach ($query->result() as $row)
                        {
                            if($fila==0){
                                echo '<div class="item active">';
                            }
                            else{
                                echo '<div class="item">';
                            }
                                echo '<img src="'.$this->obtenerImagen($row->imagen).'" />';
                                echo '<div class="carousel-caption">';
                                    echo '<h1 class="carousel-caption-header">'.$row->titulo.'</h1>';
                                    echo '<p class="carousel-caption-text hidden-sm hidden-xs">';
                                        echo character_limiter(strip_tags($row->contenido),180);
                                        echo '<a class="btn btn-link" href="'.base_url().'post/view/'.$row->idPublicacion.'">Leer más...</a>';
                                    echo ' </p>';
                                echo '</div>';
                            echo '</div>';
                            $fila++;
                        }                       
                    echo '</div>';                                        
                    /*-- Fin Wrapper for slides --*/
                }
                
                /*-- Controls --*/
                echo'<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">';
                    echo'<span class="glyphicon glyphicon-chevron-left"></span>';
                echo'</a>';
                echo'<a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">';
                    echo'<span class="glyphicon glyphicon-chevron-right"></span>';
                echo'</a>';
                /*--Fin Controls --*/
            echo'</div>';
            /*-- Fin carousel --*/
        echo'</div>';
        /*-- Fin Fila --*/
    }
    
    function obtenerImagen($image){
        if(file_exists('img/' . $image) == FALSE || $image == null){
            return base_url() . 'img/resemin.jpg';
        }
        return base_url() . 'img/' . $image;
    }
}