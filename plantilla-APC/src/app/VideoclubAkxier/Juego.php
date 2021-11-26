<?php
namespace VideoclubAkxier;

class Juego extends Soporte{
    public function __construct(
        private int $codigo,
        private string $nombre,
        private string $consola,
        private int $maximoJugadores=1
        )
        {
        parent::__construct($codigo,$nombre);
    }

    public function getConsola(){
        return $this->consola;
    }
    
    public function setConsola($consola){
        $this->consola=$consola;
    }

    public function getMaximoJugadores(){
        return $this->maximoJugadores;
    }

    public function setMaximoJugadores($maximoJugadores){
        $this->maximoJugadores=$maximoJugadores;
    }
    
    public function muestraResumen()
    {
        $resumen="";
        $resumen="<p>Código de artículo: ".$this->getCodigo()."</p>";
        $resumen.="<p>".$this->getNombre()."</p>";
        $resumen.="<p>Consola: ".$this->getConsola()."</p>";
        $resumen.="<p>Número de jugadores:".$this->getMaximoJugadores()."</p>";
        return $resumen;
    }
}