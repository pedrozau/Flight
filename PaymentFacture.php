<?php

use Dompdf\Dompdf;

require __DIR__. "/vendor/autoload.php";

// instantiate and use the dompdf class
$dompdf = new Dompdf();

#$dompdf->loadHtml('<h1> Fatura do usuario </h1>');

// (Optional) Setup the paper size and orientation
ob_start();
require __DIR__ ."/src/facture.php";
$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
#$dompdf->stream();
$dompdf->stream("file.pdf",["Attachment" =>false]);
