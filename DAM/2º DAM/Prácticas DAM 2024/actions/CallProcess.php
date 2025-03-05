<?php


class CallProcess{

     public function __construct($arrayfileData, $numerosBuscar, $facture, $precios) {
        foreach ($arrayfileData as $fileData) {
            foreach ($fileData as $row) {
                $numeroLlamada = $row[1];
        
                if (in_array($numeroLlamada, $numerosBuscar)) {
                    $tiempoLlamada = $row[3]; // Suponiendo que el tiempo está en la posición 2
                    $tiempoLlamadaMinutos = $tiempoLlamada / 60;
    
                    // Determinar el precio según el tipo de llamada
                    $precioDecimal = 0;
                    $descripcion = '';
    
                    if ($precios === 'precios1') {
                        $precioDecimal = 0.2;
                        $descripcion = "Llamada de $numeroLlamada con un coste de ";
                    } elseif ($precios === 'precios2') {
                        $precioDecimal = 0.15;
                        $descripcion = "Llamada de $numeroLlamada con un coste de ";
                    } elseif ($precios === 'precios3') {
                        $precioDecimal = 0.1;
                        $descripcion = "Llamada de $numeroLlamada con un coste de ";
                    }
    
                    if ($precioDecimal > 0) {
                        $costeLlamada = $tiempoLlamadaMinutos * $precioDecimal;
                        $costeLlamada_formateado = number_format($costeLlamada, 2);
                        $descripcion .= "$costeLlamada_formateado €";
                        $facture->insertLine($descripcion, $tiempoLlamada, $precioDecimal);
                        var_dump($facture);
                    }
                }
            }
        }
       
     }
    }   



