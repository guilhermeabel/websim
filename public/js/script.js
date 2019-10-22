$(".custom-file-input").on("change", function () {
    let ext = $(this.value.match(/\.([^\.]+)$/));
    switch (ext[0]) {
        case ".txt":
            $(this).addClass("is-valid");
            break;
        default:
            $(this).addClass("is-invalid");
            alert("Não são permitidos arquivos em formatos diferentes de .txt");
            this.value = "Arquivo...";
    }
    let fileName = $(this)
        .val()
        .split("\\")
        .pop();
    $(this)
        .next(".custom-file-label")
        .addClass("selected")
        .html(fileName);
});
<<<<<<< Updated upstream
$(".card").hide().fadeIn(1000);
=======
$(".card")
    .hide()
    .fadeIn(1000);
$(".custom-control-label").click(function () {
    $(this)
        .parent()
        .parent()
        .parent()
        .parent()
        .parent()
        .toggleClass("border border-primary custom-border");
});
// $("document").ready
>>>>>>> Stashed changes
