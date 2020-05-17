<?php

ini_set('display_errors', E_ALL);

/* interface ExportarArquivoInterface
{
    static public function generate(String $content) : String;
    static public function printPdf($file);
}
 */


class DOMPDF //implements ExportarArquivoInterface
{
    public static function generate(String $content) : String
    {
        return "<h1>{$content}</h1>";
    }

    static public function printPdf($file)
    {
        return $file;
    }
}

class PdfFile //implements ExportarArquivoInterface
{
    public static function generate(String $content) : String
    {
        return "<h2>{$content}</h2>";
    }

    static public function printPdf($file)
    {
        return $file;
    }
}


class PDF extends DOMPDF
{

}

echo PDF::generate('Olá!');