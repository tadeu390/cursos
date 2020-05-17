<?php

ini_set('display_errors', E_ALL);

interface ExportarArquivoInterface
{
    static public function generate(String $content) : String;
    static public function printPdf($file);
}

class DOMPDF
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

class PdfFile
{
    public static function generate2(String $content) : String
    {
        return "<h2>{$content}</h2>";
    }

    static public function printPdf2($file)
    {
        return $file;
    }
}


/* class PDF extends DOMPDF  implements ExportarArquivoInterface
{
    static public function generate(String $content) : String
    {
        return parent::generate($content);
    }

    static public function printPdf($file)
    {
        return parent::printPdf($file);
    }
} */

class PDF extends PdfFile implements ExportarArquivoInterface
{
    static public function generate(String $content) : String
    {
        return parent::generate2($content);
    }

    static public function printPdf($file)
    {
        return parent::printPdf2($file);
    }
}

echo PDF::generate('Olá!');

/**
 * AQUI IMPLEMENTEI PARTINDO DO PONTO EM QUE OS MÉTODOS DO DOMPDF E DO PDFFILE
 * POSSUIAM ASSINATURAS DIFERENTES
 */