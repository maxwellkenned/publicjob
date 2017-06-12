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


function formatarData(date){
    var dateSplit = date.split('-');
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
                html += '<div class="vaga" onmousemove="showBody('+item.id+')" onmouseout="hideBody('+item.id+')" >';
                    html += '<div class="col-md-8 vaga">';
                        html += '<div id="vaga-'+item.id+'" class="cabecalho-vaga" >';
                                html += '<div class="vaga title-vaga"><h3><a href="/vaga/'+item.id+'">'+item.titulo+'</a></h3></div>';
                                html += '<div class="vaga empresa-vaga">Empresa: &nbsp;'+item.empresa+'</div>';
                                html += '<div class="vaga salario-vaga">Salário: &nbsp;'+item.salario+'</div>';
                        html += '</div>';
                        html += '<div id="corpo-vaga-'+item.id+'"  style="display:none;">';
                                html += '<div class="vaga date-vaga">Período: &nbsp;'+formatarData(item.dt_ini)+' a '+formatarData(item.dt_fin)+'</div>';
                                html += '<div class="vaga jornada-vaga">Jornada: &nbsp;'+item.jornada+'</div>';
                                html += '<div class="vaga local-vaga">Local: &nbsp;'+item.cidade+' - '+item.UF+'</div>';
                        html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-4 enviar-cv" id="btn-vaga-'+item.id+'">';
                            html += '<a href="/enviarcv/'+item.id+'" class="btn btn-warning btn-block enviar-cv">Enviar CV</a>';
                    html += '</div>';
                html += '</div>';
        });
        html += '</div></ul>'
        $('#vagas').html(html);
    });
}