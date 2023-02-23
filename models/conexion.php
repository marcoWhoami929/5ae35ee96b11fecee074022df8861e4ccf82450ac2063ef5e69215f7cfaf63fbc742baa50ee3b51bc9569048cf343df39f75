<?php
class Conexion
{
    public function conectar()
    {
        $conexion =  new PDO(
            "mysql:host=localhost;dbname=sanfranciscodekkerlab",
            "root",
            "",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
            )
        );

        return $conexion;
    }
}
