<?php

include_once('../conexao.php');


if (isset($_GET['relatorio'])) {

        $relatorio = $_GET['relatorio'];
        $arquivo = fopen("C:TRADESIS/tmp/LOG.txt", "a");
        fwrite($arquivo, 'POST' . json_encode($_POST) . "\n");
        fclose($arquivo);
        
        $periododias = isset($_POST["periododias"]) && $_POST["periododias"] !== "" ? $_POST["periododias"] : null;
        $semanaldia1 = isset($_POST["semanaldia1"]) && $_POST["semanaldia1"] !== "" ? $_POST["semanaldia1"] : null;
        $semanaldia2 = isset($_POST["semanaldia2"]) && $_POST["semanaldia2"] !== "" ? $_POST["semanaldia2"] : null;
        $semanaldia3 = isset($_POST["semanaldia3"]) && $_POST["semanaldia3"] !== "" ? $_POST["semanaldia3"] : null;
        $diadomes1 = isset($_POST["diadomes1"]) && $_POST["diadomes1"] !== "" ? $_POST["diadomes1"] : null;
        $diadomes2 = isset($_POST["diadomes2"]) && $_POST["diadomes2"] !== "" ? $_POST["diadomes2"] : null;

        $hora = explode(':', $_POST['hrprocessar']);
        $hrprocessar = $hora[0] * 3600 + $hora[1] * 60;

        if ($relatorio == "fin_cre02") {
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['codigoFilial']),
                                'cliente' => ($_POST['cliente'] == 'Geral' ? true : false),
                                'dtinicial' => $_POST['dataInicial'],
                                'dtfinal' => $_POST['dataFinal'],
                                'relatoriogeral' => ($_POST['relatoriogeral'] == 'Sim' ? true : false),
                                'sel-mod' => $_POST['modalidade'],
                                'consultalp' => ($_POST['consideralp'] == 'Sim' ? true : false),
                                'considerarfeirao' => ($_POST['considerafeirao'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "recper") {
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['codigoFilial']),
                                'pgdtinicial' => $_POST['periodoPagInicial'],
                                'pgdtfinal' => $_POST['periodoPagFinal'],
                                'pvdtinical' => $_POST['periodoVenInicial'],
                                'pvdtfinal' => $_POST['periodoVenFinal'],
                                'consultalp' => ($_POST['consideralp'] == 'Sim' ? true : false),
                                'sel-mod' => $_POST['modalidade'],
                                'considerarfeirao' => ($_POST['considerafeirao'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "frrescart_v1801") {
                $parametros = array(
                        "parametros" => array(array(
                                'cliente' => ($_POST['cliente'] == 'Geral' ? true : false),
                                'dtinicial' => $_POST['dataInicial'],
                                'dtfinal' => $_POST['dataFinal'],
                                'clinovos' => ($_POST['clinovos'] == 'Sim' ? true : false),
                                'sel-mod' => $_POST['modalidade'],
                                'considerarfeirao' => ($_POST['considerafeirao'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "rec-moe-nov") {
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['codigoFilial']),
                                'dtinicial' => $_POST['dataInicial'],
                                'dtfinal' => $_POST['dataFinal'],
                                'sel-mod' => $_POST['modalidade'],
                                'considerarfeirao' => ($_POST['considerafeirao'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "cdleld") {
                $parametros = array(
                        "parametros" => array(array(
                                'etb_ini' => $_POST['dataInicial'],
                                'etb_fim' => $_POST['dataFinal']
                        ))
                );
        }

        $apiEntrada = array(
                'dtprocessar' => $_POST['dtprocessar'],
                'hrprocessar' => $hrprocessar,
                'progcod' => $_POST['progcod'],
                'nomeRel' => $_POST['nomeRel'],
                'parametros' => $parametros,
                'periodicidade' =>  $_POST['periodicidade'],
                'periododias' =>  $_POST['periododias'],
                'diadomes1' =>  $_POST['diadomes1'],
                'diadomes2' =>  $_POST['diadomes2'],
                'diasemana1' =>  $_POST['diasemana1'],
                'diasemana2' =>  $_POST['diasemana2'],
                'diasemana3' =>  $_POST['diasemana3'],
                'diasemana1' =>  $_POST['diasemana1'],
        );
        $arquivo = fopen("C:TRADESIS/tmp/LOG.txt", "a");
        fwrite($arquivo, 'APIENTRADA' . json_encode($apiEntrada) . "\n");
        fclose($arquivo);
       
        $relatorios = chamaAPI(null, '/relatorios/agendamento', json_encode($apiEntrada), 'PUT');
}
