<?php
// lucas 23022024 - criado programa

include_once '../head.php';
include_once '../database/relatorios.php';
include_once '../database/agendamento.php';

$progcod = "frsalcart_v2002";
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
                <h5>Vencidos e a Vencer</h5>
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

                <a href="frsalcart_v2002_inserir.php" role="button" class="btn btn-success btn-sm">Novo</a>

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
                                            data-cre="<?php echo $relatorio['parametros']['cre'] ?>" 
                                            data-codigoFilial="<?php echo $relatorio['parametros']['codigoFilial'] ?>" 
                                            data-modalidade="<?php echo $relatorio['parametros']['mod-sel'] ?>" 
                                            data-dataInicial="<?php echo $relatorio['parametros']['dataInicial'] ?>" 
                                            data-dataFinal="<?php echo $relatorio['parametros']['dataFinal'] ?>"
                                            data-dataReferencia="<?php echo $relatorio['parametros']['dataReferencia'] ?>" 
                                            data-considerafeirao="<?php echo $relatorio['parametros']['consulta-parcelas-LP'] ?>" 
                                            data-consideralp="<?php echo $relatorio['parametros']['feirao-nome-limpo'] ?>" 
                                            data-abreporanoemi="<?php echo $relatorio['parametros']['abreporanoemi'] ?>" 
                                            data-clinovos="<?php echo $relatorio['parametros']['clinovos'] ?>"
                                            data-porestab="<?php echo $relatorio['parametros']['porestab'] ?>"
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
                                    <label>Cliente</label>
                                    <input type="text" class="form-control" id="cliente" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Filial</label>
                                    <input type="text" class="form-control" id="codigoFilial" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Modalidade</label>
                                    <input type="text" class="form-control" id="modalidade" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Data Inicial</label>
                                    <input type="text" class="form-control" id="dataInicial" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Data Final</label>
                                    <input type="text" class="form-control" id="dataFinal" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>Data Referencia</label>
                                    <input type="text" class="form-control" id="dataReferencia" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>considerafeirao</label>
                                    <input type="text" class="form-control" id="considerafeirao" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>consideralp</label>
                                    <input type="text" class="form-control" id="consideralp" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>abreporanoemi</label>
                                    <input type="text" class="form-control" id="abreporanoemi" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>clinovos</label>
                                    <input type="text" class="form-control" id="clinovos" readonly>
                                </div>
                                <div class="form-group col">
                                    <label>porestab</label>
                                    <input type="text" class="form-control" id="porestab" readonly>
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
                var cre = $(this).attr("data-cre")  == true ? "Geral" : "Não";
                var codigoFilial = $(this).attr("data-codigoFilial");
                var modalidade = $(this).attr("data-modalidade");
                var dataInicial = $(this).attr("data-dataInicial");
                var dataFinal = $(this).attr("data-dataFinal");
                var dataReferencia = $(this).attr("data-dataReferencia");
                var considerafeirao = $(this).attr("data-considerafeirao") == true ? "Sim" : "Não";
                var consideralp = $(this).attr("data-consideralp")  == true ? "Sim" : "Não";
                var abreporanoemi = $(this).attr("data-abreporanoemi")  == true ? "Sim" : "Não";
                var clinovos = $(this).attr("data-clinovos")  == true ? "Sim" : "Não";
                var porestab = $(this).attr("data-porestab")  == true ? "Sim" : "Não";

                $('#cliente').val(cre);
                $('#codigoFilial').val(codigoFilial);
                $('#modalidade').val(modalidade);
                $('#dataInicial').val(formatarData(dataInicial));
                $('#dataFinal').val(formatarData(dataFinal));
                $('#dataReferencia').val(formatarData(dataReferencia));
                $('#considerafeirao').val(considerafeirao);
                $('#consideralp').val(consideralp);
                $('#abreporanoemi').val(abreporanoemi);
                $('#clinovos').val(clinovos);
                $('#porestab').val(porestab);

                $('#parametros-modal').modal('show');

            });

            // formata data no formato AAAA-MM-DD para DD/MM/AAAA
            function formatarData(data) {
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