// Ao inicial o documento seta os inputs como disabled
$(document).ready(function() {
    $(".periododias").prop("disabled", true);
    $(".diasemana1").prop("disabled", true);
    $(".quinzenal").prop("disabled", true);
    $(".diadomes2").prop("disabled", true);
    $(".mensal").prop("disabled", true);
});
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

        $(".periododias").prop("disabled", false);
        $(".diasemana1").prop("disabled", true);
        $(".quinzenal").prop("disabled", true);
        $(".diadomes2").prop("disabled", true);
        $(".mensal").prop("disabled", true);

        $(".periododias").prop("required", true);
        $(".diasemana1").prop("required", false);
        $(".quinzenal").prop("required", false);
        $(".diadomes2").prop("required", false);
        $(".mensal").prop("required", false);
    }
    if ($("#periodicidade").val() == 'S') {
        $("#semanal").removeClass("d-none");
        $("#unico").addClass("d-none");
        $("#diario").addClass("d-none");
        $("#quinzenal").addClass("d-none");
        $("#mensal").addClass("d-none");

        $(".periododias").prop("disabled", true);
        $(".diasemana1").prop("disabled", false);
        $(".quinzenal").prop("disabled", true);
        $(".diadomes2").prop("disabled", true);
        $(".mensal").prop("disabled", true);

        $(".periododias").prop("required", false);
        $(".diasemana1").prop("required", true);
        $(".quinzenal").prop("required", false);
        $(".diadomes2").prop("required", false);
        $(".mensal").prop("required", false);
    }
    if ($("#periodicidade").val() == 'Q') {
        $("#quinzenal").removeClass("d-none");
        $("#unico").addClass("d-none");
        $("#diario").addClass("d-none");
        $("#semanal").addClass("d-none");
        $("#mensal").addClass("d-none");
    
        $(".periododias").prop("disabled", true);
        $(".diasemana1").prop("disabled", true);
        $(".quinzenal").prop("disabled", false);
        $(".diadomes2").prop("disabled", false);
        $(".mensal").prop("disabled", true);

        $(".periododias").prop("required", false);
        $(".diasemana1").prop("required", false);
        $(".quinzenal").prop("required", true);
        $(".diadomes2").prop("required", true);
        $(".mensal").prop("required", false);
    }
    if ($("#periodicidade").val() == 'M') {
        $("#mensal").removeClass("d-none");
        $("#unico").addClass("d-none");
        $("#diario").addClass("d-none");
        $("#semanal").addClass("d-none");
        $("#quinzenal").addClass("d-none");

        $(".periododias").prop("disabled", true);
        $(".diasemana1").prop("disabled", true);
        $(".quinzenal").prop("disabled", true);
        $(".diadomes2").prop("disabled", true);
        $(".mensal").prop("disabled", false);

        $(".periododias").prop("required", false);
        $(".diasemana1").prop("required", false);
        $(".quinzenal").prop("required", false);
        $(".diadomes2").prop("required", false);
        $(".mensal").prop("required", true);
    }
});


//input limitando em dois digitos
$(document).ready(function() {
    $("#inputdoisdig").keyup(function() {
        $("#inputdoisdig").val(this.value.match(/[0-9]*/));
    });
});