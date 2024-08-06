<?php
// lucas 23022024 - criado programa

include_once('../head.php');
$ipfilial = explode(".", $_SERVER['REMOTE_ADDR']);
$filial = 0;
if ($ipfilial[0] == 172 || $ipfilial[0] == 192) {
    if ($ipfilial[1] == 17 || $ipfilial[1] == 23 || $ipfilial[1] == 168) {
        $filial = $ipfilial[2];
    }
}

$progcod = "cdleld2";
?>

<!doctype html>
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
                        <h4 class="col">CDC Pagamentos</h4>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/relatorios.php?operacao=cdleld2" method="post">
                    <div class="row">
                        <div class="col">
                            <label>Usuário</label>
                            <div class="form-group">
                                <input type="text" name="usercod" id="usercod" class="form-control" value="Lebes" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <label>Programa</label>
                            <div class="form-group">
                                <input type="text" name="progcod" class="form-control" value="cdleld2" autocomplete="off" readonly>
                            </div>
                        </div>

                    </div>
                    <label>Nome do relatório</label>
                    <div class="form-group">
                        <input type="text" name="nomeRel" id="nomeRel" class="form-control" value="<?php echo $progcod ?>" autocomplete="off">
                        <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" id="REMOTE_ADDR" hidden>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col">
                            <label class="mt-1">CRE - Clientes com dias de pagamento de: </label>
                        </div>
                        <div class="form-group col mt-3">
                            <input type="text" class="form-control text-end" name="etb_ini" id="etb_ini" value="1" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                        </div>
                        <div class="form-group col-1">
                            <label class="mt-4">Até: </label>
                        </div>
                        <div class="form-group col mt-3">
                            <input type="text" class="form-control text-end" name="etb_fim" id="etb_fim" value="30" maxlength="2" pattern="([0-9]{1}{2})" autocomplete="off">
                        </div>
                    </div>
            </div><!-- container -->
            <div class="card-footer bg-transparent mt-2" style="text-align:right">
                <button type="submit" class="btn btn-sm btn-success">Gerar Relatório</button>
                </form>
                <button type="buttom" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalAgendamento" id="btnAgendamento">Agendar Relatório</button>
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
                formData.append("usercod", $("#usercod").val());
                formData.append("REMOTE_ADDR", $("#REMOTE_ADDR").val());
                formData.append("etb_ini", $("#etb_ini").val());
                formData.append("etb_fim", $("#etb_fim").val());
                /* for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                } */

                $.ajax({
                    url: "../database/agendamento.php?relatorio=cdleld2",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: refreshPage,
                });
            });

            function refreshPage() {
                window.location.reload();
                var url = window.location.href;
                url = url.replace('_inserir', '')
                window.location.href = url;
            }
        });

        //Usa click do botão para enviar ao modal o nomeRel digitado no form
        $("#btnAgendamento").click(function() {
            nomeRel = $("#nomeRel").val();
            $('#nomeRel_modal').val(nomeRel);
        });

        $(document).ready(function() {
            $("#inputdoisdig").keyup(function() {
                $("#inputdoisdig").val(this.value.match(/[0-9]*/));
            });
        });
    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>