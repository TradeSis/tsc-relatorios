<?php
// lucas 120320204 id884 bootstrap local - alterado head

include_once('../head.php');
$filial = explode(".", $_SERVER['REMOTE_ADDR']);
$filial = isset($filial[2]);

$progcod = "loj_cre01_ma";
?>

<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body class="bg-transparent">

    <?php include_once '../agendamento/agendamento_modal.php' ?>

    <div class="container pt-3" style="width:700px">
        <div class="card shadow">
            <div class="card-header border-1">
                <div class="row">
                    <div class="col-10">
                        <h4 class="col">Posição de cliente por periodo - A</h4>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/relatorios.php?operacao=loj_cre01_ma" method="post">
                    <div class="row">
                        <div class="col">
                            <label>Usuário</label>
                            <div class="form-group">
                                <input type="text" name="usercod" class="form-control" value="Lebes" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <label>Programa</label>
                            <div class="form-group">
                                <input type="text" name="progcod" class="form-control" value="loj_cre01_ma" autocomplete="off" readonly>
                            </div>
                        </div>
                    </div>
                    <label>Nome do relatório</label>
                    <div class="form-group">
                        <input type="text" name="relatnom" class="form-control" value="Posicao de cliente por periodo - A" autocomplete="off" readonly>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Modalidade</label>
                            <select class="form-control" name="modalidade" id="modalidade">
                                <option value="crediario">Crediario</option>
                                <option value="emprestimos">Emprestimos</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Posição</label>
                            <select class="form-control" name="posicao" id="posicao">
                                <option value="1">Posição 1</option>
                                <option value="2">Posição 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Filial</label>
                            <?php if ($filial <= 0) { ?>
                                <input type="number" class="form-control" name="codigoFilial" id="codigoFilial">
                            <?php } else { ?>
                                <input type="number" class="form-control" value="<?php echo $filial ?>" name="codigoFilial" id="codigoFilial" readonly>
                            <?php } ?>
                            <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" hidden>
                        </div>
                        <div class="form-group col">
                            <label>Data Inicial</label>
                            <input type="date" class="form-control" name="dataInicial" id="dataInicial">
                        </div>
                        <div class="form-group col">
                            <label>Data Final</label>
                            <input type="date" class="form-control" name="dataFinal" id="dataFinal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Considera apenas LP</label>
                            <select class="form-control" name="consideralp" id="consideralp">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Considerar apenas feirao</label>
                            <select class="form-control" name="considerafeirao" id="considerafeirao">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Ordenação</label>
                            <select class="form-control" name="ordem" id="ordem">
                                <option value="1">Alfabetica</option>
                                <option value="2">Vencimento</option>
                                <option value="3">Bairro</option>
                                <option value="4">Valor Vencido</option>
                                <option value="5">Novação</option>
                            </select>
                        </div>
                    </div>
            </div><!-- container -->
            <div class="card-footer bg-transparent mt-2" style="text-align:right">
                <button type="submit" class="btn btn-sm btn-success">Gerar Relatório</button>
                </form>
                <button type="buttom" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalAgendamento">Agendar Relatório</button>
            </div>

        </div><!-- card shadow -->
    </div><!-- container -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        $(document).ready(function() {

            $("#formAgendamento").submit(function(event) {

                event.preventDefault();
                var formData = new FormData(this);
                //formulario de parametros
                formData.append("modalidade", $("#modalidade").val());
                formData.append("posicao", $("#posicao").val());
                formData.append("codigoFilial", $("#codigoFilial").val());
                formData.append("dataInicial", $("#dataInicial").val());
                formData.append("dataFinal", $("#dataFinal").val());
                formData.append("consideralp", $("#consideralp").val());
                formData.append("considerafeirao", $("#considerafeirao").val());
                formData.append("ordem", $("#ordem").val());
                /* for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                } */

                $.ajax({
                    url: "../database/agendamento.php?relatorio=loj_cre01_ma",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage
                });
            });

            function refreshPage() {
                window.location.reload();
                var url = window.location.href;
                url = url.replace('_inserir', '')
                window.location.href = url;
            }
        });

    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>