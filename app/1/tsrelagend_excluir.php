<?php
// Inicio
$log_datahora_ini = date("dmYHis");
$acao="excluir"; 
$arqlog = defineCaminhoLog()."apilebes_agendamento_".date("dmY").".log";
$arquivo = fopen($arqlog,"a");
$identificacao = $log_datahora_ini.$acao;
fwrite($arquivo,$identificacao."-ENTRADA->".json_encode($jsonEntrada)."\n");   

    $conteudoEntrada = json_encode(
        array(
            'tsrelagend' => 
            array(
                array('id-recid' =>  $jsonEntrada["id-recid"]                         
                )
            )
        )
    );

    $progr = new chamaprogress();
    $retorno = $progr->executarprogress("relatorios/app/1/tsrelagend_excluir",$conteudoEntrada);
    fwrite($arquivo,$identificacao."-RETORNO->".$retorno."\n");
    $conteudoSaida = json_decode($retorno,true);
    if (isset($conteudoSaida["conteudoSaida"][0])) { // Conteudo Saida - Caso de erro
        $jsonSaida = $conteudoSaida["conteudoSaida"][0];
    } 

   
fclose($arquivo);
?>
