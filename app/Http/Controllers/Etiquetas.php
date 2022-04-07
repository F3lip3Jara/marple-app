<?php

namespace App\Http\Controllers;

use Exception;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Illuminate\Http\Request;

class Etiquetas extends Controller
{



    public function imprimir(){

        $nombre = "ZTPLT";
        $testStr = 'N
        A50,300,0,3,2,2,R,"Example6"
        P1
        ';


        try {
           /* $connector = new WindowsPrintConnector($nombre);
            $printer = new Printer($connector);


            $printer -> text($testStr);
            $printer -> feed();
            $printer -> cut();
            $printer -> close();

            return "imprimiendo";*/

                $file = fopen("C:\\texto1.txt", "a");

                fwrite($file, "N" . PHP_EOL);
                fwrite($file, 'A50,300,0,3,2,2,R,"Example6"' . PHP_EOL);
                fwrite($file, 'P1' . PHP_EOL);

                fclose($file);





        } catch(Exception $e) {
            return "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }


}
