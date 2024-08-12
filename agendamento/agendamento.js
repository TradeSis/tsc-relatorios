// select de periodicidade
$("#periodicidade").change(function() {
    if ($("#periodicidade").val() == 'U') {
        $("#unico").removeClass("d-none");
        $("#diario").addClass("d-none");
        $("#semanal").addClass("d-none");
        $("#quinzenal").addClass("d-none");
        $("#mensal").addClass("d-none");
    }
    if ($("#periodicidade").val() == 'D') {
        $("#diario").removeClass("d-none");
        $("#unico").addClass("d-none");
        $("#semanal").addClass("d-none");
        $("#quinzenal").addClass("d-none");
        $("#mensal").addClass("d-none");
    }
    if ($("#periodicidade").val() == 'S') {
        $("#semanal").removeClass("d-none");
        $("#unico").addClass("d-none");
        $("#diario").addClass("d-none");
        $("#quinzenal").addClass("d-none");
        $("#mensal").addClass("d-none");
    }
    if ($("#periodicidade").val() == 'Q') {
        $("#quinzenal").removeClass("d-none");
        $("#unico").addClass("d-none");
        $("#diario").addClass("d-none");
        $("#semanal").addClass("d-none");
        $("#mensal").addClass("d-none");
        $(".mensal").prop("disabled", true);
        $(".quinzenal").prop("disabled", false);
    }
    if ($("#periodicidade").val() == 'M') {
        $("#mensal").removeClass("d-none");
        $("#unico").addClass("d-none");
        $("#diario").addClass("d-none");
        $("#semanal").addClass("d-none");
        $("#quinzenal").addClass("d-none");
        $(".quinzenal").prop("disabled", true);
        $(".mensal").prop("disabled", false);
    }
});


//input limitando em dois digitos
$(document).ready(function() {
    $("#inputdoisdig").keyup(function() {
        $("#inputdoisdig").val(this.value.match(/[0-9]*/));
    });
});