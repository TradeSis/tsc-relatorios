<?php

include_once('../conexao.php');

function buscaAgendamento($progcod)
{

        $entrada = array(
                'progcod' => $progcod
        );

        $apiEntrada = array(
                'entrada' => array($entrada)
        );
        $relatorios = chamaAPI(null, '/relatorios/agendamento', json_encode($apiEntrada), 'GET');
        return $relatorios;
}

if (isset($_GET['relatorio'])) {

        $relatorio = $_GET['relatorio'];
        
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
                                'considerarfeirao' => ($_POST['considerafeirao'] == 'Sim' ? true : false),
                                'fil17' => $_POST['fil17']
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
                                'etb_ini' => intval($_POST['etb_ini']),
                                'etb_fim' => intval($_POST['etb_fim'])
                        ))
                );
        }

        if ($relatorio == "frsalcart_v2002") {
                $parametros = array(
                        "parametros" => array(array(
                                'cre' => ($_POST['cliente'] == 'Geral' ? true : false),
                                'codigoFilial' => intval($_POST['codigoFilial']), /* estabelecimento */
                                'mod-sel' => $_POST['modalidade'],
                                'dataInical' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'dataReferencia' => $_POST['dataReferencia'],
                                'consulta-parcelas-LP' => ($_POST['consideralp'] == 'Sim' ? true : false),
                                'feirao-nome-limpo' => ($_POST['considerafeirao'] == 'Sim' ? true : false),
                                'abreporanoemi' => ($_POST['anoEmissao'] == 'Sim' ? true : false),
                                'clinovos' => ($_POST['clinovos'] == 'Sim' ? true : false),
                                'porestab' => ($_POST['porfilial'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "resliq") {
                $parametros = array(
                        "parametros" => array(array(
                                'mod-sel' => $_POST['modalidade'],
                                'dataInical' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'feirao-nome-limpo' => ($_POST['considerafeirao'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "cdleld2") {
                $parametros = array(
                        "parametros" => array(array(
                                'etb_ini' => intval($_POST['etb_ini']),
                                'etb_fim' => intval($_POST['etb_fim'])
                        ))
                );
        }

        if ($relatorio == "connov01_v0718") {
                $parametros = array(
                        "parametros" => array(array(
                                'codigoFilial' => intval($_POST['codigoFilial']),
                                'mod-sel' => $_POST['modalidade'],
                                'dataInical' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'feirao-nome-limpo' => ($_POST['considerafeirao'] == 'Sim' ? true : false),
                                'vindex' => $_POST['vindex']
                        ))
                );
        }

        if ($relatorio == "aco13j") {
                $parametros = array(
                        "parametros" => array(array(
                                'dataInical' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal']
                        ))
                );
        }

        if ($relatorio == "loj_cred01") { // OBS: REVISAR PARAMETROS
                $parametros = array(
                        "parametros" => array(array(
                                'posicao' => $_POST['posicao'],
                                'codigoFilial' => intval($_POST['codigoFilial']),
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'ordem' => $_POST['ordem']
                        ))
                );
        }

        if ($relatorio == "loj_cre01_ma") { // OBS: REVISAR PARAMETROS
                $parametros = array(
                        "parametros" => array(array(
                                'modalidade' => $_POST['modalidade'],
                                'posicao' => $_POST['posicao'],
                                'codigoFilial' => intval($_POST['codigoFilial']),
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'consideralp' => $_POST['consideralp'],
                                'considerafeirao' => $_POST['considerafeirao'],
                                'ordem' => $_POST['ordem']
                        ))
                );
        }

        if ($relatorio == "loj_cre01_ma") { // OBS: REVISAR PARAMETROS
                $parametros = array(
                        "parametros" => array(array(
                                'posicao' => $_POST['posicao'],
                                'modalidade' => $modalidade,
                                'codigoFilial' => intval($_POST['codigoFilial']),
                                'dataInical' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'consultalp' => ($_POST['consideralp'] == 'Sim' ? true : false),
                                'feirao-nome-limpo' => ($_POST['considerafeirao'] == 'Sim' ? true : false),
                                'alfa' => ($_POST['alfa'] == 'Sim' ? true : false)
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
       
        $relatorios = chamaAPI(null, '/relatorios/agendamento', json_encode($apiEntrada), 'PUT');
        
}
