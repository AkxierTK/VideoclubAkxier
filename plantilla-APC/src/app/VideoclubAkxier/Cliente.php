<?php

namespace VideoclubAkxier;

class Cliente
{
    private array $alquileresActuales;
    public function __construct(
        private int $codigo,
        private string $usuario,
        private string $password,
        private int $maxAlquileres=3
    )
    {
        $this->alquileresActuales=[];
    }
}
