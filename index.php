<?php

//AUTOLOAD DO COMPOSER
require __DIR__.'/vendor/autoload.php';

use Dompdf\Dompdf;



// INSTANCIA DE DOMPDF
$dompdf =  new Dompdf(["enable_remote" => true]);

//CARREGA OS DADOS DA IMPRESSAO

ob_start();
$titulo = 'Titulo';
 require __DIR__.'/arquivo.php';


//CARREGA O HTML PARA DENTRO DA CLASSE
$dompdf->loadHtml(ob_get_clean());


//SET PAPER
$dompdf->setPaper("A4");

//RENDERIZER O ARQUIVO PDF
$dompdf->render();

//IMPRIME CONTEUDO DO HTML NA TELA
$dompdf->stream("teste.pdf", ["Attachment" => false] );
