<?php
namespace VideoclubAkxier;
/**
 * Clase que representa un Soporte
 * 
 * Los Soportes serán cualquier tipo de artículo que este disponible en el Videoclub
 * 
 * @package app\VideoclubAkxier
 * @author Guillermo Ribera <riberapelaez@gmail.com>
 */
abstract class Soporte
{
    public function __construct(
    /**
     * Codigo identificativo de Soporte
     * @var int codigo
     */
        private int $codigo,
    /**
     * Nombre del Soporte
     * @var string nombre
     */
        private string $nombre
    ) {
    }
    /**
    * Devuelve el codigo del soporte
    * @return int el codigo del soporte
    */
    public function getCodigo(){
        return $this->codigo;
    }
     /**
    * Setea el codigo del soporte   
    * @param int $codigo a insertar en el soporte
    * @return null
    */
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    /**
    * Devuelve el nombre del soporte
    * @return string el nombre del soporte
    */
    public function getNombre(){
        return $this->nombre;
    }
    /**
    * Setea el nombre del soporte   
    * @param string $nombre a insertar en el soporte
    * @return null
    */
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
      /**
    * Muestra un resumen de los datos del Soporte   
    * @return null
    */
    public abstract function muestraResumen();
}
