<?php
// lucas 23022024 - criado programa

include_once '../head.php';
include_once '../database/relatorios.php';
include_once '../database/agendamento.php';

$progcod = "fin_cre02";
$relatorios = buscaRelatorios($progcod);
$agendamentos = buscaAgendamento($progcod);
?>

<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body class="bg-transparent">

    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col">
                <h5>Resumo Mensal do Caixa</h5>
            </div>
            <div class="col text-end">
                <a href="index.php" role="button" class="btn btn-primary btn-sm">Voltar</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs gap-1" id="tabs" role="tablist" style="border: none;">
                    <li class="nav-item">
                        <a class="nav-link ts-tabModal active" id="relatorios-tab" data-bs-toggle="tab" href="#relatorios" role="tab" aria-controls="relatorios" aria-selected="true">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ts-tabModal" id="agendamentos-tab" data-bs-toggle="tab" href="#agendamentos" role="tab" aria-controls="agendamentos" aria-selected="false">Agendamentos</a>
                    </li>

                </ul>
            </div>
            <div class="col-2 text-end">

                <a href="#" role="button" class="btn btn-info btn-sm" onClick="window.location.reload()">
                    Atualizar
                </a>

                <a href="fin_cre02_inserir.php" role="button" class="btn btn-success btn-sm">Novo</a>

            </div>
        </div>

        <div class="tab-content">

            <!-- RELATORIOS -->
            <div class="tab-pane fade show active" id="relatorios" role="tabpanel" aria-labelledby="relatorios-tab">
                <div class="container-fluid p-0 m-0">

                    <div class="table table-responsive mt-2">
                        <table class="table table-sm table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Usuário</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Hora</th>
                                    <th class="text-center">Nome do relatório</th>
                                    <th class="text-center">Nome do arquivo</th>
                                    <th class="text-center">REMOTE_ADDR</th>
                                    <th class="text-center">Parâmetros</th>
                                    <th class="text-center">PDF</th>
                                </tr>
                            </thead>
                            <?php
                            if (!empty($relatorios)) {
                                foreach ($relatorios as $relatorio) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $relatorio['IDRelat'] ?></td>
                                        <td class="text-center"><?php echo $relatorio['usercod'] ?></td>
                                        <td class="text-center"><?php echo date('d/m/Y', strtotime($relatorio['dtinclu'])) ?></td>
                                        <td class="text-center"><?php echo $relatorio['hrinclu'] ?></td>
                                        <td class="text-center"><?php echo $relatorio['nomerel'] ?></td>
                                        <td class="text-center"><?php echo $relatorio['nomeArquivo'] ?></td>
                                        <td class="text-center"><?php echo $relatorio['REMOTE_ADDR'] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#parametros-modal" 
                                            data-etbcod="<?php echo $relatorio['parametros']['etbcod'] ?>" 
                                            data-cre="<?php echo $relatorio['parametros']['cre'] ?>" 
                                            data-dtini="<?php echo $relatorio['parametros']['dtini'] ?>" 
                                            data-dtfin="<?php echo $relatorio['parametros']['dtfin'] ?>" 
                                            data-relatoriogeral="<?php echo $relatorio['parametros']['relatorio-geral'] ?>"
                                            data-modalidade="<?php echo $relatorio['parametros']['sel-mod'] ?>"
                                            data-consultaparcelasLP="<?php echo $relatorio['parametros']['consulta-parcelas-LP'] ?>"
                                            data-feiraonomelimpo="<?php echo $relatorio['parametros']['feirao-nome-limpo'] ?>"
                                            >Parâmetros</a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm" href="visualizar.php?nomeArquivo=<?php echo $relatorio['nomeArquivo'] ?>">Visualizar</a>
                                        </td>
                                    </tr>
                                   
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Parâmetros -->
            <div class="modal fade" id="parametros-modal" tabindex="-1" aria-labelledby="parametros-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Parâmetros do Relatório</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label>Filial</label>
                                    <input type="text" class="form-control" id="etbcod" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Cliente</label>
                                    <input type="text" class="form-control" id="cre" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Data Inicial</label>
                                    <input type="text" class="form-control" id="dtini" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Data Final</label>
                                    <input type="text" class="form-control" id="dtfin" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Relatório geral</label>
                                    <input type="text" class="form-control" id="relatorio-geral" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Modalidade</label>
                                    <input type="text" class="form-control" id="modalidade" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Considera apenas LP</label>
                                    <input type="text" class="form-control" id="consulta-parcelas-LP" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Considerar apenas feirao</label>
                                    <input type="text" class="form-control" id="feirao-nome-limpo" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL EXCLUIR AGENDAMENTOS -->
            <?php include_once '../agendamento/agendamento_excluir.php' ?>

            <!-- TABELA DE AGENDAMENTOS -->
            <div class="tab-pane fade" id="agendamentos" role="tabpanel" aria-labelledby="agendamentos-tab">
                <div class="container-fluid p-0 m-0">
                   
                    <div class="table table-responsive mt-2">
                        <table class="table table-sm table-hover table-bordered text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>Usuário</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>nomeRel</th>
                                    <th>periodicidade</th>
                                    <th>descrição</th>
                                    <th>REMOTE_ADDR</th>
                                    <th>parâmetros</th>
                                </tr>
                            </thead>
                            <?php
                            if (!empty($agendamentos)) {
                                foreach ($agendamentos as $agendamento) {
                                    if ($agendamento['periodicidade'] == "U") {
                                        $periodicidade = "Único";
                                        $descPeriodicidade = "Somente uma vez";
                                    }
                                    if ($agendamento['periodicidade'] == "D") {
                                        $periodicidade = "Diário";
                                        $descPeriodicidade = "Todo dia: " . $agendamento['periododias'];
                                    }
                                    if ($agendamento['periodicidade'] == "S") {
                                        $periodicidade = "Semanal";
                                        if($agendamento['diasemana1'] == 1){
                                            $descPeriodicidade = "Somente: Domingo ";
                                        }
                                        if($agendamento['diasemana1'] == 2){
                                            $descPeriodicidade = "Somente: Segunda ";
                                        }
                                        if($agendamento['diasemana1'] == 3){
                                            $descPeriodicidade = "Somente: Terça ";
                                        }
                                        if($agendamento['diasemana1'] == 4){
                                            $descPeriodicidade = "Somente: Quarta ";
                                        }
                                        if($agendamento['diasemana1'] == 5){
                                            $descPeriodicidade = "Somente: Quinta ";
                                        }
                                        if($agendamento['diasemana1'] == 6){
                                            $descPeriodicidade = "Somente: Sexta ";
                                        }
                                        if($agendamento['diasemana1'] == 7){
                                            $descPeriodicidade = "Somente: Sábado ";
                                        }
                                        
                                    }
                                    if ($agendamento['periodicidade'] == "Q") {
                                        $periodicidade = "Quinzenal";
                                        $descPeriodicidade = "Somente nos dias: " . $agendamento['diadomes1'] . " e " . $agendamento['diadomes2'];
                                    }
                                    if ($agendamento['periodicidade'] == "M") {
                                        $periodicidade = "Mensal";
                                        $descPeriodicidade = "Todo dia: " . $agendamento['diadomes1'];
                                    }

                            ?>
                                    <tr>
                                        <td><?php echo $agendamento['usercod'] ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($agendamento['dtprocessar'])) ?></td>
                                        <td><?php echo $agendamento['hrprocessar'] ?></td>
                                        <td><?php echo $agendamento['nomeRel'] ?></td>
                                        <td><?php echo $periodicidade ?></td>
                                        <td><?php echo $descPeriodicidade ?></td>
                                        <td><?php echo $agendamento['REMOTE_ADDR'] ?></td>
                                        <td>
                                            <a class="btn btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#parametros-modal" 
                                            data-etbcod="<?php echo $agendamento['parametros']['etbcod'] ?>" 
                                            data-cre="<?php echo $agendamento['parametros']['cre'] ?>" 
                                            data-dtini="<?php echo $agendamento['parametros']['dtini'] ?>" 
                                            data-dtfin="<?php echo $agendamento['parametros']['dtfin'] ?>" 
                                            data-relatoriogeral="<?php echo $agendamento['parametros']['relatorio-geral'] ?>"
                                            data-modalidade="<?php echo $agendamento['parametros']['sel-mod'] ?>"
                                            data-consultaparcelasLP="<?php echo $agendamento['parametros']['consulta-parcelas-LP'] ?>"
                                            data-feiraonomelimpo="<?php echo $agendamento['parametros']['feirao-nome-limpo'] ?>"
                                            >Parâmetros</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#excluirAgendamento-modal" 
                                            data-recID="<?php echo $agendamento['id-recid'] ?>"
                                            data-dtprocessar="<?php echo $agendamento['dtprocessar'] ?>" 
                                            data-hrprocessar="<?php echo $agendamento['hrprocessar'] ?>" 
                                            data-periodicidade="<?php echo $periodicidade ?>"
                                            ><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    
                            <?php }
                            } ?>
                        </table>
                    </div>
                </div>
            </div>


        </div><!-- tab-content -->

        <!-- LOCAL PARA COLOCAR OS JS -->

        <?php include_once ROOT . "/vendor/footer_js.php"; ?>

        <script>
            //PARAMETROS RELATORIO
            $(document).on('click', 'a[data-bs-target="#parametros-modal"]', function() {
                var etbcod = $(this).attr("data-etbcod");
                var cre = $(this).attr("data-cre") == true ? "Geral" : "Filial";
                var dtini = $(this).attr("data-dtini");
                dtini = dtini[0] == "#" ? dtini : formatarData(dtini);

                var dtfin = $(this).attr("data-dtfin");
                dtfin = dtfin[0] == "#" ? dtfin : formatarData(dtfin);

                var relatoriogeral = $(this).attr("data-relatoriogeral") == true ? "Sim" : "Não";
                var modalidade = $(this).attr("data-modalidade");
                var consultaparcelasLP = $(this).attr("data-consultaparcelasLP") == true ? "Sim" : "Não";
                var feiraonomelimpo = $(this).attr("data-feiraonomelimpo") == true ? "Sim" : "Não";

                $('#etbcod').val(etbcod);
                $('#cre').val(cre);
                $('#dtini').val(dtini);
                $('#dtfin').val(dtfin);
                $('#relatorio-geral').val(relatoriogeral);
                $('#modalidade').val(modalidade);
                $('#consulta-parcelas-LP').val(consultaparcelasLP);
                $('#feirao-nome-limpo').val(feiraonomelimpo);

                $('#parametros-modal').modal('show');

            });

            //EXCLUIR AGENDAMENTO
            $(document).on('click', 'a[data-bs-target="#excluirAgendamento-modal"]', function() {
                
                var recID = $(this).attr("data-recID");
                var dtprocessar = $(this).attr("data-dtprocessar");
                var hrprocessar = $(this).attr("data-hrprocessar");
                var periodicidade = $(this).attr("data-periodicidade");
               
                $('#excluir_recID').val(recID);
                $('#excluir_dtprocessar').val(formatarData(dtprocessar));
                $('#excluir_hrprocessar').val(hrprocessar);
                $('#excluir_periodicidade').val(periodicidade);

                $('#excluirAgendamento-modal').modal('show');
            });

            // formata data no formato AAAA-MM-DD para DD/MM/AAAA
            function formatarData(data) {
                if(data == "" || data == null){
                    return " ";
                }
                resultado = data.split("-");

                vdia = resultado[2];
                vmes = resultado[1];
                vano = resultado[0];

                return vdia + '/' + vmes + '/' + vano;
            }
        </script>
        <script>
        $(document).ready(function() {

            $("#excluirFormAgendamento").submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "../database/agendamento.php?operacao=excluir",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            function refreshPage() {
                window.location.reload();
            }
        });
        </script>
        <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>