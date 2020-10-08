function addtelefone() {
    var add = "<br><input type='text' name='tel[]' id='tel2' style='width: 11.5em'>"
    document.getElementById("addtel").insertAdjacentHTML('beforebegin', add);
}

function addtelefone2() {
    var add = "<br><input type='text' name='tel2[]' id='tel3' style='width: 11.5em'>"
    document.getElementById("addtel").insertAdjacentHTML('beforebegin', add);
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $(input).next()
        .attr('src', e.target.result)
    };
    reader.readAsDataURL(input.files[0]);
    }
    else {
        var img = input.value;
        $(input).next().attr('src',img);
    }
} 

function verificaMostraBotao(){
    $('input[type=file]').each(function(index){
        if ($('input[type=file]').eq(index).val() != ""){
            readURL(this);
            $('.hide').show();
        }
    });
}

$('input[type=file]').on("change", function(){
verificaMostraBotao();
});

$('.hide').on("click", function(){
    $(document.body).append($('<input />', {type: "file" }).change(verificaMostraBotao));
    $(document.body).append($('<img />'));
    $('.hide').hide();
});

function exclusao(id) {
    var resposta = confirm("Deseja remover esse funcionário?");
    if (resposta == true) {
         window.location.href = "../controle/excluifuncionario.php?id="+id;
    }
}