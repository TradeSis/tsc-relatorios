<?php
// lucas 23022024 - criado programa

include_once '../head.php';
include_once '../database/relatorios.php';
include_once '../database/agendamento.php';

$progcod = "recper";
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
                <h5>Recebimento por período</h5>
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

                <a href="recper_inserir.php" role="button" class="btn btn-success btn-sm">Novo</a>

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
                                        <td class="text-center"><?php echo $relatorio['progcod'] ?></td>
                                        <td class="text-center"><?php echo $relatorio['nomeArquivo'] ?></td>
                                        <td class="text-center"><?php echo $relatorio['REMOTE_ADDR'] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#parametros-modal" 
                                            data-etbcod="<?php echo $relatorio['parametros']['etbcod'] ?>" 
                                            data-dti="<?php echo $relatorio['parametros']['dti'] ?>" 
                                            data-dtf="<?php echo $relatorio['parametros']['dtf'] ?>" 
                                            data-dtveni="<?php echo $relatorio['parametros']['dtveni'] ?>" 
                                            data-dtvenf="<?php echo $relatorio['parametros']['dtvenf'] ?>"
                                            data-consultaparcelasLP="<?php echo $relatorio['parametros']['consulta-parcelas-LP'] ?>"
                                            data-modalidade="<?php echo $relatorio['parametros']['sel-mod'] ?>"
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
                                <div class="form-group col-6">
                                    <label>Filial</label>
                                    <input type="text" class="form-control" id="etbcod" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Pagamento Inicial</label>
                                    <input type="text" class="form-control" id="dti" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Pagamento Final</label>
                                    <input type="text" class="form-control" id="dtf" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Vencimento Inicial</label>
                                    <input type="text" class="form-control" id="dtveni" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Vencimento Final</label>
                                    <input type="text" class="form-control" id="dtvenf" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Considera apenas LP</label>
                                    <input type="text" class="form-control" id="consulta-parcelas-LP" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>modalidade</label>
                                    <input type="text" class="form-control" id="modalidade" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Considerar apenas feirao</label>
                                    <input type="text" class="form-control" id="feirao-nome-limpo" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- AGENDAMENTOS -->
            <?php include_once '../agendamento/agendamento_table.php' ?>


        </div><!-- tab-content -->

        <!-- LOCAL PARA COLOCAR OS JS -->

        <?php include_once ROOT . "/vendor/footer_js.php"; ?>

        <script>
            $(document).on('click', 'a[data-bs-target="#parametros-modal"]', function() {
                var etbcod = $(this).attr("data-etbcod");
                var dti = $(this).attr("data-dti");
                var dtf = $(this).attr("data-dtf");
                var dtveni = $(this).attr("data-dtveni");
                var dtvenf = $(this).attr("data-dtvenf");
                var consultaparcelasLP = $(this).attr("data-consultaparcelasLP") == true ? "Sim" : "Não";
                var modalidade = $(this).attr("data-modalidade");
                var feiraonomelimpo = $(this).attr("data-feiraonomelimpo") == true ? "Sim" : "Não";


                $('#etbcod').val(etbcod);
                $('#dti').val(formatarData(dti));
                $('#dtf').val(formatarData(dtf));
                $('#dtveni').val(formatarData(dtveni));
                $('#dtvenf').val(formatarData(dtvenf));
                $('#consulta-parcelas-LP').val(consultaparcelasLP);
                $('#modalidade').val(modalidade);
                $('#feirao-nome-limpo').val(feiraonomelimpo);

                $('#parametros-modal').modal('show');

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
        <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>