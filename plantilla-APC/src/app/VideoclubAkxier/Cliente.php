<?php

namespace VideoclubAkxier;

use VideoclubAkxier\Util\CantidadSoportesAlcanzadaException;
use VideoclubAkxier\Util\SoporteYaAlquiladoException;
use VideoclubAkxier\Util\SoporteNoEncontradoException;

class Cliente
{
    private array $alquileresActuales;
    public function __construct(
        private int $codigo,
        private string $usuario,
        private string $password,
        private int $maxAlquileres = 3
    ) {
        $this->alquileresActuales = [];
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function alquilar(Soporte $soporte)
    {
        $codigoS = $soporte->getCodigo();
        if (isset($this->alquileresActuales[$codigoS])) {
            throw new SoporteYaAlquiladoException("<br>El cliente tiene alquilado el soporte " . $soporte->titulo);
        } elseif ($this->maxAlquileres <= count($this->alquileresActuales)) {
            throw new CantidadSoportesAlcanzadaException("<br>El cliente ya ha alzancado la cantidad de soportes máxima");
        }else{
            $this->alquileresActuales[$codigoS]=$soporte;
        }
    }
    public function devolver(Soporte $soporte)
    {
        $codigoS = $soporte->getCodigo();
        if (isset($this->alquileresActuales[$codigoS])) {
            unset($this->alquileresActuales[$codigoS]);
        } else{
            throw new SoporteNoEncontradoException("<br>Soporte no encontrado");
        }
    }
    public function muestraResumen(){
        $cadena="";
        $cadena="Cliente: ".$this->getCodigo()."<br>Nombre: ".$this->getusuario();
        return $cadena;
    }

}
