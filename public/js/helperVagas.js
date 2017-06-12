$(function(){
    $('#uf').change(function(){
        if( $(this).val() ){
            id = $(this).val();
            $('#escolhaEstado').text('-- Carregando --');
            $.get('/getcidades/'+id, function(data){
                var options = '<option value="">-- Escolha uma cidade --</option>';	
                $.each(JSON.parse(data), function(i, item){
                    options += '<option value="' + item.name + '" id="' + item.id + '" title="' + item.name + '">' + item.name + '</option>';
                });
                $('#escolhaEstado').text('-- Escolha a cidade --');
                $('#cidade').html(options).show();
            });
        } else {
            $('#cod_cidades').html('<option value="">-- Escolha um estado --</option>');
        }
    });
    
    $('#form').ready(function(){
        $.ajax({
            method:'GET',
            url: 'getestados',
            dataType: 'json'
        }).done(function(data){
                var options = '<option value=""></option>';	
                $.each(data, function(i, item){
                    options += '<option value="' + item.abbr + '" id="' + item.id + '" title="' + item.name + '">' + item.abbr + '</option>';
                });
                $('#uf').html(options);
            });
    });
});
