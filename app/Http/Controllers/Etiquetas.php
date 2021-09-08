<?php

namespace App\Http\Controllers;

use Exception;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Illuminate\Http\Request;

class Etiquetas extends Controller
{
    public function imprimir(){
        $nombre = "PDFprinter";
        $testStr = "Testing 123";
        try {
            $connector = new WindowsPrintConnector($nombre);
            $printer = new Printer($connector);
            $printer -> qrCode($testStr);
            $printer -> feed();
            $printer -> cut();
            $printer -> close();


        } catch(Exception $e) {
            return "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }


}
