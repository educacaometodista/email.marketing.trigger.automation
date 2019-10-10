<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampoVariavel extends Model
{
    public static $campos = [
        '[DATE d/m]' => 'campoDate($string, $dados["DATE"], "d-m")',
        '[DATE Y]' => 'campoDate($string, $dados["DATE"], "Y")',
        '[DATE HALF]' => 'campoSemestre($string, $dados["DATE"])',
    ];

    public static function getCampo($string, $dados)
    {
        foreach (self::$campos as $campo_variavel => $metodo)
        {
            $valor = eval(" return self::$metodo;");
            $string = str_replace($campo_variavel, $valor, $string);
        }

        return $string;
    }

    public static function campoSemestre($string, $date)
    {
        $date = date('m', strtotime($date));
        return $date >= 7 ? '2' : '1';
    }

    public static function campoDate($string, $date, $format)
    {
        $date = date($format, strtotime($date));
        return $date;
    }

}
