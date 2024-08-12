<?php
// Inicio
$log_datahora_ini = date("dmYHis");
$acao="inserir"; 
$arqlog = defineCaminhoLog()."apilebes_agendamento_".date("dmY").".log";
$arquivo = fopen($arqlog,"a");
$identificacao = $log_datahora_ini.$acao;
fwrite($arquivo,$identificacao."-ENTRADA->".json_encode($jsonEntrada)."\n");   

    $conteudoEntrada=json_encode($jsonEntrada);

if (!isset($dadosEntrada["tsrelagend"])) {
    $parametrosJSON = /*array('parametros' 
            => array(*/ $jsonEntrada["parametros"] /*))*/;

    $conteudoEntrada = json_encode(
        array(
            'tsrelagend' => 
            array(
                  array('usercod' =>  $jsonEntrada["usercod"], 
                        'REMOTE_ADDR' =>  $jsonEntrada["REMOTE_ADDR"],
                        'dtprocessar' =>  $jsonEntrada["dtprocessar"], 
                        'hrprocessar' =>  $jsonEntrada["hrprocessar"],             
                        'progcod' =>  $jsonEntrada["progcod"],   
                        'nomeRel' =>  $jsonEntrada["nomeRel"],           
                        'parametrosJSON' =>  json_encode($parametrosJSON),
                        'periodicidade' =>  $jsonEntrada['periodicidade'], 
                        'periododias' =>  $jsonEntrada['periododias'],
                        'diadomes1' =>  $jsonEntrada['diadomes1'],
                        'diadomes2' =>  $jsonEntrada['diadomes2'],
                        'diasemana1' =>  $jsonEntrada['diasemana1'],
                        'diasemana2' =>  $jsonEntrada['diasemana2'],
                        'diasemana3' =>  $jsonEntrada['diasemana3']                         
                  )
            )
        )
    );
}

    //echo $conteudoEntrada;
    fwrite($arquivo,$identificacao."-FORMATADO->".$conteudoEntrada."\n");   

    $progr = new chamaprogress();

    $retorno = $progr->executarprogress("relatorios/app/1/agendamento_inserir",$conteudoEntrada);

    fwrite($arquivo,$identificacao."-PROGRESS->".json_encode($retorno)."\n");
    
    $jsonSaida = json_decode($retorno,true);
    $parametros = json_decode($jsonSaida["relatorios"][0]["parametrosJSON"],true);
    $jsonSaida["relatorios"][0]["parametros"] = $parametros["parametros"][0];
    $jsonSaida = $jsonSaida["relatorios"][0];

    fwrite($arquivo,$identificacao."-SAIDA->".json_encode($jsonSaida)."\n");

fclose($arquivo);
    
?>
