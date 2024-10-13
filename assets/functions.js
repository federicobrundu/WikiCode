


function accedi(){
    var email = $('#email').val();
    var psw = $('#psw').val();
    if(email == '' && psw == ''){
        $('#email').after("<p class='mt-2'style='color:rgb(169, 15, 15)'>Inserisci un indirizzo email</p>");
        $('#psw').after("<p class='mt-2'style='color:rgb(169, 15, 15)'>Inserisci una password</p>");
    }else if(email == ''){
        $('#email').after("<p class='mt-2'style='color:rgb(169, 15, 15)'>Inserisci un indirizzo email</p>");
    }else if(psw == ''){
        $('#psw').after("<p class='mt-2'style='color:rgb(169, 15, 15)'>Inserisci una password</p>");
    }else{
        document.form_login.submit();
    }
}

function registrati(){
    var email = $('#email').val();
    var psw = $('#psw').val();
    var conf_psw =$('#conf_psw').val();
    var nome= $('#nome').val();
    var giorno= $('#giorno_birth').val();
    var mese= $('#mese_birth').val();
    var anno= $('#anno_birth').val();
    var data_nascita = anno + '-'+mese+'-'+ giorno;
    console.log(data_nascita);
    if(email == '' && psw == '' && conf_psw == ''&& giorno == ''&& mese == ''&& anno == ''&& nome =='' ){
        $('#comune').after("<p class='mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Tutti i campi sono obbligatori</p>");
    }else if (nome == ''){
        $('#nome').after("<p class='mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Inserisci il tuo nome</p>");
    }else if (email == ''){
        $('#email').after("<p class='mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Inserisci un indirizzo email</p>");
    }else if (psw == ''){
        $('#psw').after("<p class='mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Inserisci la password</p>");
        return;
    }else if ( conf_psw == ''){
        $('#conf_psw').after("<p class='mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Conferma la password</p>");
        return;
    }else if (giorno == '' || mese =='' || anno ==''){
        $('#anno_birth').after("<p class= 'mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Inserisci la data di nascita</p>");
        return;
    }else if (comune == ''){
        $('#comune').after("<p class='mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Inserisci il comune</p>");
        return;
    }else if(psw != conf_psw){
        $('#conf_psw').after("<p class='mt-2'style='color:rgb(169, 15, 15);margin-bottom:3px'>Le due password non coincidono</p>");
        return;
    }else{
        document.form_signup.submit();
    }
}



$(document).ready(function () {
    $(window).on('load',function () {
        $(window).scroll(function() {
            var nav_position = $('nav');
            var top = nav_position.offset().top;

            if(top > 58 ){
                $( "nav" ).css( "background-color", "#531ff0" ).fadeIn( 9000 );
                $( "nav" ).css( "transition", "all 0.4s ease-in-out" );
            }else if(top == 0){
                $( "nav" ).css( "background-color", "inherit" ).fadeIn('slow');
            }
        });
    });
});
$(document) .ready (function(){
    $(".hamburger") .on ('click', function () {
        $('.sidebar').toggleClass ('open');
        $('.hamburger').css('display','none');
    });
    $(".ham") .on ('click', function () {
        $('.sidebar').toggleClass ('open');
        $('.hamburger').css('display','block');
    });
})
$(document) .ready (function(){
    $("#linguaggi").on('change', function () {
        var selezione =$('#linguaggi').val();
        if(selezione == 'Client-side'){
            $('#linguaggio_client').css('display','inline-block');
            $('#linguaggio_server').css('display','none');
            $('#insert').on('click',function(){
                var id_linguaggio = $('#linguaggio_client').val();
                var titolo = $('#titolo').val();
                var risposta = $('#risposta').val();
                $.ajax({
                    url:'../functions/insert_client.php',
                    type:'post',
                    data:{'id_linguaggio': id_linguaggio,'titolo':titolo,'risposta':risposta},
                    datatype:'html',
                    success:function(dati){
                        response = JSON.parse(dati);
                        console.log(response['response']);
                        $('#form_insert').css('display','none');
                        $('#apri_insert').css('display','block');
                        $('#linguaggio_client').css('display','none');
                        $('#chiudi_insert').css('display','none');
                        $('.to_close').css('display','block');
                        $('#linguaggi').val(1);
                        $('#linguaggio_client').val('');
                        $('#titolo').val('');
                        $('#risposta').val('');
                        $('#apri_insert').after("<p class= 'mt-2'style='color:#fff;margin-bottom:3px'>"
                            +response['response']+"</p>");
                    }        
                });
            })}else if(selezione == 'Server-side'){
            $('#linguaggio_client').css('display','none');
            $('#linguaggio_server').css('display','inline-block');
            $('#insert').on('click',function(){
                var id_linguaggio = $('#linguaggio_server').val();
                var titolo = $('#titolo').val();
                var risposta = $('#risposta').val();
                $.ajax({
                    url:'../functions/insert_server.php',
                    type:'post',
                    data:{'id_linguaggio': id_linguaggio,'titolo':titolo,'risposta':risposta},
                    datatype:'html',
                    success:function(dati){
                        response = JSON.parse(dati);
                        console.log(response['response']);
                        $('#form_insert').css('display','none');
                        $('#apri_insert').css('display','block');
                        $('#linguaggio_client').css('display','none');
                        $('#chiudi_insert').css('display','none');
                        $('.to_close').css('display','block');
                        $('#linguaggi').val(1);
                        $('#linguaggio_client').val('');
                        $('#titolo').val('');
                        $('#risposta').val('');
                        $('#apri_insert').after("<p class= 'mt-2'style='color:#fff;margin-bottom:3px'>"
                            +response['response']+"</p>");
                    }        
                });
            })}else if(selezione ==1){
            $('#linguaggio_client').css('display','none');
            $('#linguaggio_server').css('display','none');
        }
    });
})

$(document) .ready (function(){
    $("#apri_insert") .on ('click', function () {
        $('#form_insert').css('display','block');
        $('#apri_insert').css('display','none');
        $('#chiudi_insert').css('display','block');
        $('.to_close').css('display','none');
    });
    $("#chiudi_insert") .on ('click', function () {
        $('#form_insert').css('display','none');
        $('#apri_insert').css('display','block');
        $('#apri_insert').css('left','-21px');
        $('#chiudi_insert').css('display','none');
        $('.to_close').css('display','block');
    });

})


function get_risposte_client(id,id_linguaggio){
        $.ajax({
            url:'../../functions/get_ajax_client.php',
            type:'post',
            data:{'id': id,'id_linguaggio':id_linguaggio},
            datatype:'html',
            success:function(result){
                response = JSON.parse(result);
                var msg='';
                if(response['status'] == 'KO'){
                    msg='Questo argomento non è presente nel database';
                    $('.col-3').removeClass('col-3');
                    $('.row').removeClass('mt-3');
                    $('.dad div').css('display','inline');
                    $('.dad div').css('width','20%');
                    $('button').css('width','auto');
                    $('button').css('font-size','18px');
                    $('button').css('display','inline');
                    $('#titolo').html(msg);
                    $('#risposta').html('');
                    if ($(window).width() < 1105){
                        $('button').css('font-size','15px');
                    }
                }else if(response['status'] == 'OK'){
                    $('.col-3').removeClass('col-3');
                    $('.row').removeClass('mt-3');
                    $('.dad div').css('display','inline');
                    $('.dad div').css('width','20%');
                    $('button').css('width','auto');
                    $('button').css('font-size','18px');
                    $('button').css('display','inline');
                    $('#titolo').html(response['titolo']);
                    $('#risposta').html(response['risposta']);
                    if ($(window).width() < 1105){
                        $('button').css('font-size','15px');
                    }
                }
            }
        });
}
function get_risposte_server(id,id_linguaggio){
    $.ajax({
        url:'../../functions/get_ajax_server.php',
        type:'post',
        data:{'id': id,'id_linguaggio':id_linguaggio},
        datatype:'html',
        success:function(result){
            response = JSON.parse(result);
            var msg='';
            if(response['status'] == 'KO'){
                msg='Questo argomento non è presente nel database';
                $('.col-3').removeClass('col-3');
                $('.row').removeClass('mt-3');
                $('.dad div').css('display','inline');
                $('.dad div').css('width','20%');
                $('button').css('width','auto');
                $('button').css('font-size','18px');
                $('button').css('display','inline');
                $('#titolo').html(msg);
                $('#risposta').html('');
                if ($(window).width() < 1105){
                    $('button').css('font-size','15px');
                }
            }else if(response['status'] == 'OK'){
                $('.col-3').removeClass('col-3');
                $('.row').removeClass('mt-3');
                $('.dad div').css('display','inline');
                $('.dad div').css('width','20%');
                $('button').css('width','auto');
                $('button').css('font-size','18px');
                $('button').css('display','inline');
                $('#titolo').html(response['titolo']);
                $('#risposta').html(response['risposta']);
                if ($(window).width() < 1105){
                    $('button').css('font-size','15px');
                }
            }
        }
    });
}
