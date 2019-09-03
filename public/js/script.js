$(".custom-file-input").on("change", function() {
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
var e = 0;
$(".custom-control-input").on("change", function() {
    $(this).parent().parent().parent().parent().parent().toggleClass("bg-lightgray");
    $(this).parent().parent().parent().parent().parent().toggleClass("bg-white");
    $(this).parent().parent().find("i").toggleClass("fas fa-check-square")
});