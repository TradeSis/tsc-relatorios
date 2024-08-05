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
                                'etbcod' => intval($_POST['etbcod']),
                                'cre' => ($_POST['cre'] == 'Geral' ? true : false),
                                'dtini' => $_POST['dtini'],
                                'dtfin' => $_POST['dtfin'],
                                'relatorio-geral' => ($_POST['relatorio-geral'] == 'Sim' ? true : false),
                                'sel-mod' => $_POST['modalidade'],
                                'consulta-parcelas-LP' => ($_POST['consulta-parcelas-LP'] == 'Sim' ? true : false),
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "recper") {
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['etbcod']),
                                'dti' => $_POST['dti'],
                                'dtf' => $_POST['dtf'],
                                'dtveni' => $_POST['dtveni'],
                                'dtvenf' => $_POST['dtvenf'],
                                'consulta-parcelas-LP' => ($_POST['consulta-parcelas-LP'] == 'Sim' ? true : false),
                                'sel-mod' => $_POST['modalidade'],
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "frrescart_v1801") {
                $parametros = array(
                        "parametros" => array(array(
                                'cre' => ($_POST['cre'] == 'Geral' ? true : false),
                                'dti' => $_POST['dti'],
                                'dtf' => $_POST['dtf'],
                                'clinovos' => ($_POST['clinovos'] == 'Sim' ? true : false),
                                'sel-mod' => $_POST['modalidade'],
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false),
                                'vindex' => $_POST['vindex']
                        ))
                );
        }

        if ($relatorio == "rec-moe-nov") {
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['etbcod']),
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
                                'cre' => ($_POST['cre'] == 'Geral' ? true : false),
                                'codigoFilial' => intval($_POST['codigoFilial']), 
                                'mod-sel' => $_POST['modalidade'],
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'dataReferencia' => $_POST['dataReferencia'],
                                'consulta-parcelas-LP' => ($_POST['consulta-parcelas-LP'] == 'Sim' ? true : false),
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false),
                                'abreporanoemi' => ($_POST['abreporanoemi'] == 'Sim' ? true : false),
                                'clinovos' => ($_POST['clinovos'] == 'Sim' ? true : false),
                                'porestab' => ($_POST['porestab'] == 'Sim' ? true : false)
                        ))
                );
        }

        if ($relatorio == "resliq") {
                $parametros = array(
                        "parametros" => array(array(
                                'mod-sel' => $_POST['modalidade'],
                                'dataInical' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false)
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
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'considerarFeirao' => ($_POST['considerarFeirao'] == 'Sim' ? true : false),
                                'vindex' => intval($_POST['vindex'])
                        ))
                );
        }

        if ($relatorio == "aco13j") {
                $parametros = array(
                        "parametros" => array(array(
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal']
                        ))
                );
        }

        if ($relatorio == "loj_cred01") { 
                $parametros = array(
                        "parametros" => array(array(
                                'posicao' => $_POST['posicao'],
                                'codigoFilial' => intval($_POST['codigoFilial']),
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'alfa' => ($_POST['alfa'] == "1" ? true : false)
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
                'usercod' => $_POST['usercod'],
                'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
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

if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "excluir") {
                $hora = explode(':', $_POST['hrprocessar']);
                $hrprocessar = $hora[0] * 3600 + $hora[1] * 60;

		$apiEntrada = array(
			'dtprocessar' => $_POST['dtprocessar'],
			'hrprocessar' => $hrprocessar
		);
	
		$relatorios = chamaAPI(null, '/relatorios/agendamento', json_encode($apiEntrada), 'DELETE');
	}

}
