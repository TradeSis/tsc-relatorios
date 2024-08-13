<?php
// Inicio
$log_datahora_ini = date("dmYHis");
$acao="excluir"; 
$arqlog = defineCaminhoLog()."apilebes_agendamento_".date("dmY").".log";
$arquivo = fopen($arqlog,"a");
$identificacao = $log_datahora_ini.$acao;
fwrite($arquivo,$identificacao."-ENTRADA->".json_encode($jsonEntrada)."\n");   


    $progr = new chamaprogress();
    $retorno = $progr->executarprogress("relatorios/app/1/tsrelagend_excluir",json_encode($jsonEntrada));
    fwrite($arquivo,$identificacao."-RETORNO->".$retorno."\n");
    $conteudoSaida = json_decode($retorno,true);
    if (isset($conteudoSaida["conteudoSaida"][0])) { // Conteudo Saida - Caso de erro
        $jsonSaida = $conteudoSaida["conteudoSaida"][0];
    } 

   
fclose($arquivo);
?>
