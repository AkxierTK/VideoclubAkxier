<?php

namespace VideoclubAkxier;

use VideoclubAkxier\Util\CantidadSoportesAlcanzadaException;
use VideoclubAkxier\Util\ClienteNoEncontradoException;
use VideoclubAkxier\Util\SoporteNoEncontradoException;
use VideoclubAkxier\Util\SoporteYaAlquiladoException;
include_once("Cliente.php");
include_once("Juego.php");
include_once("Soporte.php");
include_once("DLC.php");

class VideoClub{
    private array $clientes;
    private array $soportes;
    public function __construct(
        private string $nombre,
    )
    {
        $this->clientes=[];
        $this->soportes=[];
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getClientes(){
        return $this->clientes;
    }

    public function getSoportes(){
        return $this->soportes;
    }

    public function añadirSoporte(Soporte $soporte){
        $this->soportes[$soporte->getCodigo()]=$soporte;
    }


    public function añadirJuego($nombre,$consola,$maximoJugadores){
        $juego = new Juego(count($this->soportes),$nombre,$consola,$maximoJugadores);
        $this->añadirSoporte($juego);
    }

    public function añadirDLC($nombre,$juego){
        $DLC = new DLC(count($this->soportes),$nombre,$juego);
        $this->añadirSoporte($DLC);
    }

    public function añadirCliente($usuario,$password){
        $cliente= new Cliente(count($this->clientes),$usuario,$password);
        $this->clientes[count($this->clientes)]=$cliente;
    }

    public function alquilarCliente($codigoCliente, $codigoSoporte){
            if(isset($this->clientes[$codigoCliente])){
                throw new ClienteNoEncontradoException("Cliente no encontrado");
            }

            if(isset($this->soportes[$codigoSoporte])){
                throw new SoporteNoEncontradoException("Soporte no encontrado");
            }

            try{
                $this->clientes[$codigoCliente]->alquilar($this->soportes[$codigoSoporte]);
            }catch(CantidadSoportesAlcanzadaException $e){
                echo $e->getMessage();
            } catch(SoporteYaAlquiladoException $e){
                echo $e->getMessage();
            }
    }

    public function devolver($codigoCliente,$codigoSoporte){
        if(isset($this->clientes[$codigoCliente])){
            throw new ClienteNoEncontradoException("Cliente no encontrado");
        }

        if(isset($this->soportes[$codigoSoporte])){
            throw new SoporteNoEncontradoException("Soporte no encontrado");
        }

        try{
            $this->clientes[$codigoCliente]->devolver($this->soportes[$codigoSoporte]);
        }catch(SoporteNoEncontradoException $e){
            echo $e->getMessage();
        }
    }
    


}

