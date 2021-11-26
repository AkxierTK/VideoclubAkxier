<?php

namespace VideoclubAkxier;

class DLC extends Juego{
    public function __construct(
        private int $codigo,
        private string $nombre,
        private string $juego
    )
    {
    }
    public function getJuego(){
        return $this->juego;
    }

    public function setJuego($juego){
        $this->juego=$juego;
    }
    public function muestraResumen()
    {
        $resumen="";
        $resumen="<p>Código de artículo: ".$this->getCodigo()."</p>";
        $resumen.="<p>Nombre: ".$this->getNombre()."</p>";
        $resumen.="<p>Juego: ".$this->getJuego()."</p>";
        return $resumen;
    }
}