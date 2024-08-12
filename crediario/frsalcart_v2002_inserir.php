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
                                <input type="text" name="usercod" id="usercod" class="form-control" value="<?php echo $_SESSION['usuario'] ?>" autocomplete="off" readonly>
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
                        <input type="text" name="nomeRel" id="nomeRel" class="form-control" value="<?php echo $progcod ?>" autocomplete="off">
                        <input type="text" class="form-control" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" name="REMOTE_ADDR" id="REMOTE_ADDR" hidden>
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
                                    <label class="mt-4">Período de: </label>
                                </div>
                                <div class="form-group col-4 mt-3">
                                    <div class="input-group mb-2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-dataInicial" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                        <input type="date" class="form-control input-dataInicial" name="dataInicial" id="dataInicial">
                                        <select class="form-control d-none select-dataInicial" name="dataInicial" id="dataInicial" disabled>
                                            <option value=null>Selecione</option>
                                            <option value="#HOJE">#HOJE</option>
                                            <option value="#HOJE-1">#HOJE-1</option>
                                            <option value="#HOJE-2">#HOJE-2</option>
                                            <option value="#HOJE-3">#HOJE-3</option>
                                            <option value="#HOJE-4">#HOJE-4</option>
                                            <option value="#HOJE-5">#HOJE-5</option>
                                            <option value="#HOJE-7">#HOJE-7</option>
                                            <option value="#HOJE-8">#HOJE-8</option>
                                            <option value="#HOJE-9">#HOJE-9</option>
                                            <option value="#HOJE-10">#HOJE-10</option>
                                            <option value="#HOJE-11">#HOJE-11</option>
                                            <option value="#HOJE-12">#HOJE-12</option>
                                            <option value="#HOJE-24">#HOJE-24</option>
                                            <option value="#DIAPRIMES">#DIAPRIMES</option>
                                            <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                            <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                            <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                            <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                            <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                            <option value="#DIAPRIMES-6">#DIAPRIMES-6</option>
                                            <option value="#DIAPRIMES-7">#DIAPRIMES-7</option>
                                            <option value="#DIAPRIMES-8">#DIAPRIMES-8</option>
                                            <option value="#DIAPRIMES-9">#DIAPRIMES-9</option>
                                            <option value="#DIAPRIMES-10">#DIAPRIMES-10</option>
                                            <option value="#DIAPRIMES-11">#DIAPRIMES-11</option>
                                            <option value="#DIAPRIMES-12">#DIAPRIMES-12</option>
                                            <option value="#DIAPRIMES-24">#DIAPRIMES-24</option>
                                            <option value="#DIAULTMES">#DIAULTMES</option>
                                            <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                            <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                            <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                            <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                            <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                            <option value="#DIAULTMES-6">#DIAULTMES-6</option>
                                            <option value="#DIAULTMES-7">#DIAULTMES-7</option>
                                            <option value="#DIAULTMES-8">#DIAULTMES-8</option>
                                            <option value="#DIAULTMES-9">#DIAULTMES-9</option>
                                            <option value="#DIAULTMES-10">#DIAULTMES-10</option>
                                            <option value="#DIAULTMES-11">#DIAULTMES-11</option>
                                            <option value="#DIAULTMES-12">#DIAULTMES-12</option>
                                            <option value="#DIAULTMES-24">#DIAULTMES-24</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-1">
                                    <label class="mt-4">Até: </label>
                                </div>
                                <div class="form-group col-4 mt-3">
                                    <div class="input-group mb-2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-dataFinal" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                        <input type="date" class="form-control input-dataFinal" name="dataFinal" id="dataFinal">
                                        <select class="form-control d-none select-dataFinal" name="dataFinal" id="dataFinal" disabled>
                                            <option value=null>Selecione</option>
                                            <option value="#HOJE">#HOJE</option>
                                            <option value="#HOJE-1">#HOJE-1</option>
                                            <option value="#HOJE-2">#HOJE-2</option>
                                            <option value="#HOJE-3">#HOJE-3</option>
                                            <option value="#HOJE-4">#HOJE-4</option>
                                            <option value="#HOJE-5">#HOJE-5</option>
                                            <option value="#HOJE-7">#HOJE-7</option>
                                            <option value="#HOJE-8">#HOJE-8</option>
                                            <option value="#HOJE-9">#HOJE-9</option>
                                            <option value="#HOJE-10">#HOJE-10</option>
                                            <option value="#HOJE-11">#HOJE-11</option>
                                            <option value="#HOJE-12">#HOJE-12</option>
                                            <option value="#HOJE-24">#HOJE-24</option>
                                            <option value="#DIAPRIMES">#DIAPRIMES</option>
                                            <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                            <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                            <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                            <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                            <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                            <option value="#DIAPRIMES-6">#DIAPRIMES-6</option>
                                            <option value="#DIAPRIMES-7">#DIAPRIMES-7</option>
                                            <option value="#DIAPRIMES-8">#DIAPRIMES-8</option>
                                            <option value="#DIAPRIMES-9">#DIAPRIMES-9</option>
                                            <option value="#DIAPRIMES-10">#DIAPRIMES-10</option>
                                            <option value="#DIAPRIMES-11">#DIAPRIMES-11</option>
                                            <option value="#DIAPRIMES-12">#DIAPRIMES-12</option>
                                            <option value="#DIAPRIMES-24">#DIAPRIMES-24</option>
                                            <option value="#DIAULTMES">#DIAULTMES</option>
                                            <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                            <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                            <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                            <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                            <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                            <option value="#DIAULTMES-6">#DIAULTMES-6</option>
                                            <option value="#DIAULTMES-7">#DIAULTMES-7</option>
                                            <option value="#DIAULTMES-8">#DIAULTMES-8</option>
                                            <option value="#DIAULTMES-9">#DIAULTMES-9</option>
                                            <option value="#DIAULTMES-10">#DIAULTMES-10</option>
                                            <option value="#DIAULTMES-11">#DIAULTMES-11</option>
                                            <option value="#DIAULTMES-12">#DIAULTMES-12</option>
                                            <option value="#DIAULTMES-24">#DIAULTMES-24</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label>Data Referência</label>
                            <div class="input-group mb-2">
                                <button class="btn btn-outline-secondary" type="button" id="button-dataReferencia" title="Data Fixa"><i class="bi bi-arrow-repeat"></i></button>
                                <input type="date" class="form-control input-dataReferencia" name="dataReferencia" id="dataReferencia" required>
                                <select class="form-control d-none select-dataReferencia" name="dataReferencia" id="dataReferencia" disabled>
                                    <option value=null>Selecione</option>
                                    <option value="#HOJE">#HOJE</option>
                                    <option value="#HOJE-1">#HOJE-1</option>
                                    <option value="#HOJE-2">#HOJE-2</option>
                                    <option value="#HOJE-3">#HOJE-3</option>
                                    <option value="#HOJE-4">#HOJE-4</option>
                                    <option value="#HOJE-5">#HOJE-5</option>
                                    <option value="#HOJE-7">#HOJE-7</option>
                                    <option value="#HOJE-8">#HOJE-8</option>
                                    <option value="#HOJE-9">#HOJE-9</option>
                                    <option value="#HOJE-10">#HOJE-10</option>
                                    <option value="#HOJE-11">#HOJE-11</option>
                                    <option value="#HOJE-12">#HOJE-12</option>
                                    <option value="#HOJE-24">#HOJE-24</option>
                                    <option value="#DIAPRIMES">#DIAPRIMES</option>
                                    <option value="#DIAPRIMES-1">#DIAPRIMES-1</option>
                                    <option value="#DIAPRIMES-2">#DIAPRIMES-2</option>
                                    <option value="#DIAPRIMES-3">#DIAPRIMES-3</option>
                                    <option value="#DIAPRIMES-4">#DIAPRIMES-4</option>
                                    <option value="#DIAPRIMES-5">#DIAPRIMES-5</option>
                                    <option value="#DIAPRIMES-6">#DIAPRIMES-6</option>
                                    <option value="#DIAPRIMES-7">#DIAPRIMES-7</option>
                                    <option value="#DIAPRIMES-8">#DIAPRIMES-8</option>
                                    <option value="#DIAPRIMES-9">#DIAPRIMES-9</option>
                                    <option value="#DIAPRIMES-10">#DIAPRIMES-10</option>
                                    <option value="#DIAPRIMES-11">#DIAPRIMES-11</option>
                                    <option value="#DIAPRIMES-12">#DIAPRIMES-12</option>
                                    <option value="#DIAPRIMES-24">#DIAPRIMES-24</option>
                                    <option value="#DIAULTMES">#DIAULTMES</option>
                                    <option value="#DIAULTMES-1">#DIAULTMES-1</option>
                                    <option value="#DIAULTMES-2">#DIAULTMES-2</option>
                                    <option value="#DIAULTMES-3">#DIAULTMES-3</option>
                                    <option value="#DIAULTMES-4">#DIAULTMES-4</option>
                                    <option value="#DIAULTMES-5">#DIAULTMES-5</option>
                                    <option value="#DIAULTMES-6">#DIAULTMES-6</option>
                                    <option value="#DIAULTMES-7">#DIAULTMES-7</option>
                                    <option value="#DIAULTMES-8">#DIAULTMES-8</option>
                                    <option value="#DIAULTMES-9">#DIAULTMES-9</option>
                                    <option value="#DIAULTMES-10">#DIAULTMES-10</option>
                                    <option value="#DIAULTMES-11">#DIAULTMES-11</option>
                                    <option value="#DIAULTMES-12">#DIAULTMES-12</option>
                                    <option value="#DIAULTMES-24">#DIAULTMES-24</option>
                                </select>
                            </div>
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
                <button type="submit" class="btn btn-sm btn-success" id="btnInserir">Gerar Relatório</button>
                </form>
                <button type="buttom" class="btn btn-sm btn-warning" data-bs-toggle="modal" id="btnAgendamento">Agendar Relatório</button>
            </div>

        </div><!-- card shadow -->
    </div><!-- container -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
        $(document).ready(function() {

            $("#formAgendamento").submit(function(event) {
                dataInicial = $(".input-dataInicial").val() != "" ? $(".input-dataInicial").val() : $(".select-dataInicial").val();
                dataFinal = $(".input-dataFinal").val() != "" ? $(".input-dataFinal").val() : $(".select-dataFinal").val();
                dataReferencia = $(".input-dataReferencia").val() != "" ? $(".input-dataReferencia").val() : $(".select-dataReferencia").val();

                event.preventDefault();
                var formData = new FormData(this);
                //formulario de parametros
                formData.append("usercod", $("#usercod").val());
                formData.append("REMOTE_ADDR", $("#REMOTE_ADDR").val());
                formData.append("cre", $("#cre").val());
                formData.append("modalidade", $("#modalidade").val());
                formData.append("codigoFilial", $("#codigoFilial").val());
                formData.append("porestab", $("#porestab").val());
                formData.append("dataInicial", dataInicial);
                formData.append("dataFinal", dataFinal);
                formData.append("dataReferencia", dataReferencia);
                formData.append("consulta-parcelas-LP", $("#consulta-parcelas-LP").val());
                formData.append("feirao-nome-limpo", $("#feirao-nome-limpo").val());
                formData.append("abreporanoemi", $("#abreporanoemi").val());
                formData.append("clinovos", $("#clinovos").val());

                for (var pair2 of formData.entries()) {
                    console.log(pair2[0] + " - " + pair2[1]);
                }

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

        //Testa campos de data ao Gerar Relatorio
        $("#btnInserir").click(function() {

            if ($("#porestab").val() == 'Sim') {
                if ($(".input-dataInicial").val() != '') {
                    var dataInicial = $(".input-dataInicial").val();
                } else {
                    var dataInicial = $(".select-dataInicial").val();
                }

                if ($(".input-dataFinal").val() != '') {
                    var dataFinal = $(".input-dataFinal").val();
                } else {
                    var dataFinal = $(".select-dataFinal").val();
                }

                if ((dataInicial == 'null') || (dataFinal == 'null')) {
                    alert("Informar Período!")
                    return false;
                }
            }
            if ($("#porestab").val() == 'Nao') {

                if ($(".input-dataReferencia").val() != '') {
                    var dataReferencia = $(".input-dataReferencia").val();
                } else {
                    var dataReferencia = $(".select-dataReferencia").val();
                }

                if (dataReferencia == 'null') {
                    alert("Informar Data Referência!")
                    return false;
                }

            }

        });

        //Testa campos de data ao Agendar relatorio, passando tambem o nomeRel
        $("#btnAgendamento").click(function() {

            nomeRel = $("#nomeRel").val();
            $('#nomeRel_modal').val(nomeRel);

            if ($("#porestab").val() == 'Sim') {
                $(".porestab").removeClass("d-none");
                $("#dataInicial").prop("disabled", false);
                $("#dataFinal").prop("disabled", false);
                $("#dataInicial").prop("required", true);
                $("#dataFinal").prop("required", true);
                $("#dataReferencia").prop("required", false);

                if ($(".input-dataInicial").val() != '') {
                    var dataInicial = $(".input-dataInicial").val();
                } else {
                    var dataInicial = $(".select-dataInicial").val();
                }

                if ($(".input-dataFinal").val() != '') {
                    var dataFinal = $(".input-dataFinal").val();
                } else {
                    var dataFinal = $(".select-dataFinal").val();
                }

                if ((dataInicial == 'null') || (dataFinal == 'null')) {
                    alert("Informar Período!")
                } else {
                    $("#dataReferencia").attr("data-bs-target='#modalAgendamento'")
                    $('#modalAgendamento').modal('show');
                }
            }
            if ($("#porestab").val() == 'Nao') {
                $(".porestab").addClass("d-none");
                $("#dataInicial").prop("disabled", true);
                $("#dataFinal").prop("disabled", true);
                $("#dataInicial").prop("required", false);
                $("#dataFinal").prop("required", false);
                $("#dataReferencia").prop("required", true);

                if ($(".input-dataReferencia").val() != '') {
                    var dataReferencia = $(".input-dataReferencia").val();
                } else {
                    var dataReferencia = $(".select-dataReferencia").val();
                }

                if (dataReferencia == 'null') {
                    alert("Informar Data Referência!")
                } else {
                    $("#dataReferencia").attr("data-bs-target='#modalAgendamento'")
                    $('#modalAgendamento').modal('show');
                }

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
                $("#dataInicial").prop("required", true);
                $("#dataFinal").prop("required", true);
                $("#dataReferencia").prop("required", false);
            }
            if ($("#porestab").val() == 'Nao') {
                $(".porestab").addClass("d-none");
                $("#dataInicial").prop("disabled", true);
                $("#dataFinal").prop("disabled", true);
                $("#dataInicial").prop("required", false);
                $("#dataFinal").prop("required", false);
                $("#dataReferencia").prop("required", true);
            }
        });

        // DATA\SELECT - DATA INICIAL
        $("#button-dataInicial").click(function() {
            $(".input-dataInicial").toggleClass("d-none");
            $(".select-dataInicial").toggleClass("d-none");

            var elemento = document.getElementById("dataInicial");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[31] == "d") {
                $("#button-dataInicial").prop("title", "Data Digitável");
                $(".input-dataInicial").prop("disabled", true);
                $(".select-dataInicial").prop("disabled", false);
                $(".input-dataInicial").prop("required", false);
                $(".select-dataInicial").prop("required", true);
            } else {
                $("#button-dataInicial").prop("title", "Data Fixa");
                $(".input-dataInicial").prop("disabled", false);
                $(".select-dataInicial").prop("disabled", true);
                $(".input-dataInicial").prop("required", true);
                $(".select-dataInicial").prop("required", false);
            }
        });

        // DATA\SELECT - DATA FINAL
        $("#button-dataFinal").click(function() {
            $(".input-dataFinal").toggleClass("d-none");
            $(".select-dataFinal").toggleClass("d-none");

            var elemento = document.getElementById("dataFinal");
            var classe = elemento.getAttribute("class");

            if (classe[29] == "d") {
                $("#button-dataFinal").prop("title", "Data Digitável");
                $(".input-dataFinal").prop("disabled", true);
                $(".select-dataFinal").prop("disabled", false);
                $(".input-dataFinal").prop("required", false);
                $(".select-dataFinal").prop("required", true);
            } else {
                $("#button-dataFinal").prop("title", "Data Fixa");
                $(".input-dataFinal").prop("disabled", false);
                $(".select-dataFinal").prop("disabled", true);
                $(".input-dataFinal").prop("required", true);
                $(".select-dataFinal").prop("required", false);
            }
        });

        // DATA\SELECT - DATA REFERENCIA
        $("#button-dataReferencia").click(function() {
            $(".input-dataReferencia").toggleClass("d-none");
            $(".select-dataReferencia").toggleClass("d-none");

            var elemento = document.getElementById("dataReferencia");
            var classe = elemento.getAttribute("class");
            //alert(classe.lastIndexOf("d-none"))
            if (classe[34] == "d") {
                $("#button-dataReferencia").prop("title", "Data Digitável");
                $(".input-dataReferencia").prop("disabled", true);
                $(".select-dataReferencia").prop("disabled", false);
                $(".input-dataReferencia").prop("required", false);
                $(".select-dataReferencia").prop("required", true);
            } else {
                $("#button-dataReferencia").prop("title", "Data Fixa");
                $(".input-dataReferencia").prop("disabled", false);
                $(".select-dataReferencia").prop("disabled", true);
                $(".input-dataReferencia").prop("required", true);
                $(".select-dataReferencia").prop("required", false);
            }
        });
    </script>
    <!-- js com script usando no modal -->
    <script src="../agendamento/agendamento.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>