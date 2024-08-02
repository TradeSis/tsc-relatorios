<?php
// lucas 23022024 - criado programa

include_once('../head.php');
$filial = explode(":", $_SERVER['REMOTE_ADDR']);
$filial = isset($filial[2]);

$progcod = "frsalcart_v2002";
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
                        <h4 class="col">Vencidos e a Vencer (NOVO)</h4>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 10px">

                <form action="../database/relatorios.php?operacao=frsalcart_v2002" method="post">
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
                                <input type="text" name="progcod" class="form-control" value="frsalcart_v2002" autocomplete="off" readonly>
                            </div>
                        </div>

                    </div>
                    <label>Nome do relatório</label>
                    <div class="form-group">
                        <input type="text" name="relatnom" class="form-control" value="Vencidos e a Vencer (NOVO)" autocomplete="off" readonly>
                        <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" hidden>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Cliente</label>
                            <select class="form-control" name="cre" id="cre">
                                <option value="Geral">Geral</option>
                                <option value="Facil">Facil</option>
                            </select>
                            <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Selecione Modalidades</label>
                            <select class="form-control" name="modalidade[]" id="modalidade" multiple style="height: 90px; overflow-y: hidden;">
                                <option value="CRE" class="cre" selected>CRE</option>
                                <option value="CP0" class="sel-mod">CP0</option>
                                <option value="CP1" class="sel-mod">CP1</option>
                                <option value="CPN" class="sel-mod">CPN</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label>Estabelecimento</label>
                            <input type="number" placeholder="Vazio = Geral" class="form-control" name="codigoFilial" id="codigoFilial">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-2">
                            <label>Por Filial</label>
                            <select class="form-control" name="porestab" id="porestab">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col porestab d-none">
                            <div class="row">
                                <!-- Por Filal = Sim -->
                                <div class="form-group col-3">
                                    <label class="mt-4">Periodo de: </label>
                                </div>
                                <div class="form-group col-4 mt-3">
                                    <input type="date" class="form-control" name="dataInicial" id="dataInicial" disabled>
                                </div>
                                <div class="form-group col-1">
                                    <label class="mt-4">Até: </label>
                                </div>
                                <div class="form-group col-4 mt-3">
                                    <input type="date" class="form-control" name="dataFinal" id="dataFinal" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Data Referencia</label>
                            <input type="date" class="form-control" name="dataReferencia" id="dataReferencia">
                        </div>
                        <div class="form-group col">
                            <label>Considera apenas LP</label>
                            <select class="form-control" name="consulta-parcelas-LP" id="consulta-parcelas-LP">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Considerar apenas feirao</label>
                            <select class="form-control" name="feirao-nome-limpo" id="feirao-nome-limpo">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4 mt-4">
                            <label>Abre por Ano de Emissao</label>
                            <select class="form-control" name="abreporanoemi" id="abreporanoemi">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
                            </select>
                        </div>
                        <div class="form-group col-8">
                            <label>Somente clientes novos (até 30 pagas) que atrasaram parcela(s):</label>
                            <select class="form-control" name="clinovos" id="clinovos">
                                <option value="Nao">Nao</option>
                                <option value="Sim">Sim</option>
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
                formData.append("cre", $("#cre").val());
                formData.append("modalidade", $("#modalidade").val());
                formData.append("codigoFilial", $("#codigoFilial").val());
                formData.append("porestab", $("#porestab").val());
                formData.append("dataInicial", $("#dataInicial").val());
                formData.append("dataFinal", $("#dataFinal").val());
                formData.append("dataReferencia", $("#dataReferencia").val());
                formData.append("consulta-parcelas-LP", $("#consulta-parcelas-LP").val());
                formData.append("feirao-nome-limpo", $("#feirao-nome-limpo").val());
                formData.append("abreporanoemi", $("#abreporanoemi").val());
                formData.append("clinovos", $("#clinovos").val());
                /* for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                } */

                $.ajax({
                    url: "../database/agendamento.php?relatorio=frsalcart_v2002",
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

        // modifica efeito de seleção do select modalidade
        window.onmousedown = function(e) {
            var el = e.target;
            if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
                e.preventDefault();

                if (el.hasAttribute('selected')) el.removeAttribute('selected');
                else el.setAttribute('selected', '');

                var select = el.parentNode.cloneNode(true);
                el.parentNode.parentNode.replaceChild(select, el.parentNode);
            }
        }
        // select de por filial, abre campos de dataInicial e dataFinal
        $("#porestab").change(function() {
            if ($("#porestab").val() == 'Sim') {
                $(".porestab").removeClass("d-none");
                $("#dataInicial").prop("disabled", false);
                $("#dataFinal").prop("disabled", false);
            }
            if ($("#porestab").val() == 'Nao') {
                $(".porestab").addClass("d-none");
                $("#dataInicial").prop("disabled", true);
                $("#dataFinal").prop("disabled", true);
            }
        });
    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>