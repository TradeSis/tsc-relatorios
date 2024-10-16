<?php

include_once('../conexao.php');

function buscaRelatorios($progcod, $usercod = null)
{

        $entrada = array(
                'progcod' => $progcod,
                'usercod' => $usercod,
        );

        $apiEntrada = array(
                'entrada' => array($entrada)
        );
        $relatorios = chamaAPI(null, '/relatorios/listagem', json_encode($apiEntrada), 'GET');
        return $relatorios;
}

if (isset($_GET['operacao'])) {

        $operacao = $_GET['operacao'];


        //
        if ($operacao == "relat") {
                $parametros = array(
                        'codigoCliente' => $_POST['codigoCliente'],
                        'codigoFilial' => $_POST['codigoFilial'],
                        'modalidade' => $_POST['modalidade'],
                        'dataInicial' => $_POST['dataInicial'],
                        'dataFinal' => $_POST['dataFinal'],
                        'numeroCertificado' => $_POST['numeroCertificado'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'relatnom' => $_POST['relatnom'],
                        'parametros' => $parametros,
                );
                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../consultas/relatorios.php');
        }

        //RESUMO LIQUIDACOES DIARIAS P/ PERIODO
        if ($operacao == "relqtdNovo") {
                $parametros = array(
                        'codigoFilial' => $_POST['codigoFilial'],
                        'dataInicial' => $_POST['dataInicial'],
                        'dataFinal' => $_POST['dataFinal'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'relatnom' => $_POST['relatnom'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );
                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../relatorios/relqtdNovo.php');
        }

        //-EXTRATO DE COBRANCA SIMPLES
        if ($operacao == "loj_cred01") {
                $parametros = array(
                        "parametros" => array(array(
                                'posicao' => intval($_POST['posicao']),
                                'codigoFilial' => $_POST['codigoFilial'],
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'alfa' => ($_POST['alfa'] == "1" ? true : false)
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );
                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../cobranca/loj_cred01.php');
        }

        //-POSICAO DE CLIENTE POR PERIODO - A
        if ($operacao == "loj_cre01_ma") {
                $parametros = array(
                        'modalidade' => $_POST['modalidade'],
                        'posicao' => $_POST['posicao'],
                        'codigoFilial' => $_POST['codigoFilial'],
                        'dataInicial' => $_POST['dataInicial'],
                        'dataFinal' => $_POST['dataFinal'],
                        'consideralp' => $_POST['consideralp'],
                        'considerafeirao' => $_POST['considerafeirao'],
                        'ordem' => $_POST['ordem'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );
                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../cobranca/loj_cre01_ma.php');
        }

        //-POSICAO DE CLIENTE POR PERIODO - B
        if ($operacao == "loj_cre01_lp") {
                $parametros = array(
                        'modalidade' => $_POST['modalidade'],
                        'posicao' => $_POST['posicao'],
                        'codigoFilial' => $_POST['codigoFilial'],
                        'dataInicial' => $_POST['dataInicial'],
                        'dataFinal' => $_POST['dataFinal'],
                        'consideralp' => $_POST['consideralp'],
                        'considerafeirao' => $_POST['considerafeirao'],
                        'ordem' => $_POST['ordem'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'relatnom' => $_POST['relatnom'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');
                header('Location: ../relatorios/loj_cre01_lp.php');
        }

        //CONFERENCIA DAS NOTAS DE TRANSFERENCIA
        if ($operacao == "anavenlj") {
                $parametros = array(
                        'codigoFilial' => $_POST['codigoFilial'],
                        'data' => $_POST['data'],
                        'codMov' => $_POST['codMov'],
                        'departamento' => $_POST['departamento'],
                        'ordem' => $_POST['ordem'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'relatnom' => $_POST['relatnom'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');
                header('Location: ../relatorios/anavenlj.php');
        }

        //VENDAS NFCE
        if ($operacao == "vendas_nfce") {
                $parametros = array(
                        'FilialInicial' => $_POST['FilialInicial'],
                        'FilialFinal' => $_POST['FilialFinal'],
                        'dataInicial' => $_POST['dataInicial'],
                        'dataFinal' => $_POST['dataFinal'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'relatnom' => $_POST['relatnom'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');
                header('Location: ../relatorios/vendas_nfce.php');
        }

        //RESUMO LIQUIDACOES P/PERIODO NOVACAO
        if ($operacao == "resliqnov") {
                $parametros = array(
                        'cliente' => $_POST['cliente'],
                        'dataInicial' => $_POST['dataInicial'],
                        'dataFinal' => $_POST['dataFinal'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'relatnom' => $_POST['relatnom'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');
                header('Location: ../relatorios/resliqnov.php');
        }

        //POSICAO VENCIDOS E A VENCER
        if ($operacao == "pogersin11") {
                $estab = $_POST['estab'];
                $dataInicial = $_POST['dataInicial'];
                $dataFinal = $_POST['dataFinal'];
                $dataRef = $_POST['dataRef'];

                if (isset($_POST['modalidade'])) {
                        $modalidades = array();
                        foreach ($_POST['modalidade'] as $modalidade) {
                                $modalidades = $modalidade;
                        }
                        $parametros['modalidade'] = $modalidades;
                }

                if ($estab == "") {
                        $estab = null;
                }

                if ($dataInicial == "") {
                        $dataInicial = null;
                }

                if ($dataFinal == "") {
                        $dataFinal = null;
                }

                if ($dataRef == "") {
                        $dataRef = null;
                }

                $parametros = array(
                        'cliente' => $_POST['cliente'],
                        'modalidade' => $_POST['modalidade'],
                        'estab' => $estab,
                        'filial' => $_POST['filial'],
                        'dataRef' => $dataRef,
                        'dataInicial' => $dataInicial,
                        'dataFinal' => $dataFinal,
                        'consideralp' => $_POST['consideralp'],
                        'considerafeirao' => $_POST['considerafeirao'],
                        'clientesnovos' => $_POST['clientesnovos'],
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'relatnom' => $_POST['relatnom'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');
                header('Location: ../relatorios/pogersin11.php');
        }

        //-RESUMO MENSAL DO CAIXA
        if ($operacao == "fin_cre02") {
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['codigoFilial']),
                                'cre' => ($_POST['cre'] == 'Geral' ? true : false),
                                'dtini' => $_POST['dtini'],
                                'dtfin' => $_POST['dtfin'],
                                'relatorio-geral' => ($_POST['relatorio-geral'] == 'Sim' ? true : false),
                                'mod-sel' => $modalidade,
                                'consulta-parcelas-LP' => ($_POST['consulta-parcelas-LP'] == 'Sim' ? true : false),
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false)
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );
                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../recebimentos/fin_cre02.php');
        }

        //-RESUMO MENSAL DO CAIXA
        if ($operacao == "recper") {
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['etbcod']),
                                'dti' => $_POST['dti'],
                                'dtf' => $_POST['dtf'],
                                'dtveni' => $_POST['dtveni'],
                                'dtvenf' => $_POST['dtvenf'],
                                'consulta-parcelas-LP' => ($_POST['consideralp'] == 'Sim' ? true : false),
                                'mod-sel' => $modalidade,
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false)
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../recebimentos/recper.php');
        }

        //-CONTROLE DE CARTEIRA (NOVO)
        if ($operacao == "frrescart_v1801") {
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }
                $parametros = array(
                        "parametros" => array(array(
                                'cre' => ($_POST['cre'] == 'Geral' ? true : false),
                                'dti' => $_POST['dti'],
                                'dtf' => $_POST['dtf'],
                                'clinovos' => ($_POST['clinovos'] == 'Sim' ? true : false),
                                'sel-mod' => $modalidade,
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false),
                                'vindex' => intval($_POST['vindex'])
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../crediario/frrescart_v1801.php');
        }

        //-NOVAÇÕES CAIXA/FILIAL
        if ($operacao == "rec-moe-nov") {
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }
                $parametros = array(
                        "parametros" => array(array(
                                'etbcod' => intval($_POST['etbcod']),
                                'dtinicial' => $_POST['dataInicial'],
                                'dtfinal' => $_POST['dataFinal'],
                                'sel-mod' => $modalidade,
                                'considerarfeirao' => ($_POST['considerafeirao'] == 'Sim' ? true : false)
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../novacoes/rec-moe-nov.php');
        }

        //-VENCIDOS E A VENCER (NOVO)
        if ($operacao == "frsalcart_v2002") {
                
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }

                $dataInicial = isset($_POST["dataInicial"]) && $_POST["dataInicial"] !== "" && $_POST["dataInicial"] !== "null"  ? $_POST["dataInicial"]  : null;
                $dataFinal = isset($_POST["dataFinal"]) && $_POST["dataFinal"] !== "" && $_POST["dataFinal"] !== "null"  ? $_POST["dataFinal"]  : null;
                $dataReferencia = isset($_POST["dataReferencia"]) && $_POST["dataReferencia"] !== "" && $_POST["dataReferencia"] !== "null"  ? $_POST["dataReferencia"]  : null;

                $parametros = array(
                        "parametros" => array(array(
                                'cre' => ($_POST['cre'] == 'Geral' ? true : false),
                                'codigoFilial' => intval($_POST['codigoFilial']), /* estabelecimento */
                                'mod-sel' => $modalidade,
                                'dataInicial' => $dataInicial,
                                'dataFinal' => $dataFinal,
                                'dataReferencia' => $dataReferencia,
                                'consulta-parcelas-LP' => ($_POST['consulta-parcelas-LP'] == 'Sim' ? true : false),
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false),
                                'abreporanoemi' => ($_POST['abreporanoemi'] == 'Sim' ? true : false),
                                'clinovos' => ($_POST['clinovos'] == 'Sim' ? true : false),
                                'porestab' => ($_POST['porestab'] == 'Sim' ? true : false)
                        ))
                );
                
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../crediario/frsalcart_v2002.php');
        }

        //-RESUMO LIQUIDACOES P/PERIODO GERAL
        if ($operacao == "resliq") {
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }
                $parametros = array(
                        "parametros" => array(array(
                                'mod-sel' => $modalidade,
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'feirao-nome-limpo' => ($_POST['feirao-nome-limpo'] == 'Sim' ? true : false)
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../recebimentos/resliq.php');
        }

         //-NOVAÇÕES POR FILIAL OK
         if ($operacao == "connov01_v0718") {
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }
                $parametros = array(
                        "parametros" => array(array(
                                'codigoFilial' => intval($_POST['codigoFilial']),
                                'mod-sel' => $modalidade,
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal'],
                                'considerarFeirao' => ($_POST['considerarFeirao'] == 'Sim' ? true : false),
                                'vindex' => intval($_POST['vindex'])
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../novacoes/connov01_v0718.php');
        }

        //-EP PAGAMENTOS
        if ($operacao == "cdleld") {
                $parametros = array(
                        "parametros" => array(array(
                                'etb_ini' => intval($_POST['etb_ini']),
                                'etb_fim' => intval($_POST['etb_fim'])
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../recebimentos/cdleld.php');
        }

        //-CDC PAGAMENTOS
        if ($operacao == "cdleld2") {
                $parametros = array(
                        "parametros" => array(array(
                                'etb_ini' => intval($_POST['etb_ini']),
                                'etb_fim' => intval($_POST['etb_fim'])
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../recebimentos/cdleld2.php');
        }
        
        //-CDC PAGAMENTOS
        if ($operacao == "aco13j") {
                $parametros = array(
                        "parametros" => array(array(
                                'dataInicial' => $_POST['dataInicial'],
                                'dataFinal' => $_POST['dataFinal']
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../novacoes/aco13j.php');
        }

        //-POSICAO DE CLIENTE POR PERIODO - A // OBS: REVISAR PARAMETROS
        if ($operacao == "loj_cre02_a") {
                $modalidade = $_POST['modalidade'];
                if (count($modalidade) == 1) {
                        $modalidade = implode($_POST['modalidade']);
                } else {
                        $modalidade = implode(",", $_POST['modalidade']);
                }
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
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../novacoes/loj_cre02_a.php');
        }

        //-RESUMO CONCILIAÇÃO CREFIARIO
        if ($operacao == "telaanaliini") {
                $parametros = array(
                        "parametros" => array(array(
                                'dtini' => $_POST['dtini'],
                                'dtfin' => $_POST['dtfin'],
                                'etbcod' => intval($_POST['etbcod']),
                                'tipooperacao' => $_POST['tipooperacao']
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../contabilidade/telaanaliini.php');
        }

        //-RELATÓRIO CPN
        if ($operacao == "relcpn-v012018") {
                $parametros = array(
                        "parametros" => array(array(
                                'dti' => $_POST['dti'],
                                'dtf' => $_POST['dtf'],
                                'etbcod' => intval($_POST['etbcod'])
                        ))
                );
                $apiEntrada = array(
                        'usercod' => $_POST['usercod'],
                        'progcod' => $_POST['progcod'],
                        'nomeRel' => $_POST['nomeRel'],
                        'parametros' => $parametros,
                        'REMOTE_ADDR' =>  $_POST['REMOTE_ADDR'],
                );

                $relatorios = chamaAPI(null, '/relatorios/inserir', json_encode($apiEntrada), 'PUT');

                header('Location: ../contabilidade/relcpn-v012018.php');
        }
}
