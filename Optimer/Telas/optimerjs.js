function readyFn() {
    $.post('listar_veiculos.php', function(retorna) {
        
        $("#conteudo").html(retorna);
    });
    
}
