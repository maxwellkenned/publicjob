$(function(){
    getVaga(null);
    
    
    $("#buscarvaga").on('keyup', function(event){
        var txt = $(this).val();
        if(txt.length >= 3){
         getVaga(txt);   
        } else {
            getVaga(null);
        }
    });
});


function formatarData(data){
    var dateSplit = data.split('-');
    var ano = dateSplit[0];
    var mes = dateSplit[1];
    var dia = dateSplit[2];
    
    return dia+'/'+mes+'/'+ano;
}
function showBody(id){
    var div = $('#corpo-vaga-'+id);
    var btn = $('#btn-vaga-'+id);
    btn.css('margin-top', '31px');
    div.show();
}
function hideBody(id){
    var div = $('#corpo-vaga-'+id);
    var btn = $('#btn-vaga-'+id);
    btn.css('margin-top', '11px');
    
    div.hide();
}

function getVaga(search){
    var url ="/getvagas";
    if(search){
      var txt = search;
    var url ="/getvagas/"+txt;  
    }
    
    $.get(url, function(data){
        var html='<ul class="vagas" style="max-height:350px;"><div class="row">';	
        $.each(JSON.parse(data), function(i, item){
            console.log(i);
            console.log(item);
                html += '<div class="vaga" onmousemove="showBody('+item[i].vaga.id+')" onmouseout="hideBody('+item[i].vaga.id+')" >';
                    html += '<div class="col-md-8 vaga">';
                        html += '<div id="vaga-'+item[i].vaga.id+'" class="cabecalho-vaga" >';
                                html += '<div class="vaga title-vaga"><h3><a href="/vaga/'+item[i].vaga.id+'">'+item[i].vaga.titulo+'</a></h3></div>';
                                html += '<div class="vaga empresa-vaga">Empresa: &nbsp;'+item[i].vaga.empresa+'</div>';
                                html += '<div class="vaga date-vaga">Período: &nbsp;'+formatarData(item[i].vaga.dt_ini)+' a '+formatarData(item[i].vaga.dt_fin)+'</div>';
                        html += '</div>';
                        html += '<div id="corpo-vaga-'+item[i].vaga.id+'"  style="display:none;">';
                                html += '<span>Candidatos:</span>'
                                $.each(item[i].candidatos, function(i, c){
                                    html += '<div class="vaga jornada-vaga"><a href="/candidato/'+c.id+'">'+c.nome+'</a></div>';
                                });
                        html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-4 enviar-cv" id="btn-vaga">';
                            html += '<a href="/vaga/'+item[i].vaga.id+'" class="btn btn-warning btn-block enviar-cv">Candidatos <span class="badge">'+item[i].num+'</span></a>';
                    html += '</div>';
                html += '</div>';
        });
        html += '</div></ul>'
        $('#vagas').html(html);
    });
}