$("#range_filter_sidebar").ionRangeSlider({
    type: "double",
    min: 0,
    max: 1000,
    from: 0,
    to: 1000,
    grid: false
});

$(window).scroll(function () {
    var scroller_anchor = $(".scroller_anchor").offset();
    var heightSearch = $('#search').height();

    if ($(this).scrollTop() >= scroller_anchor && $('.scroller').css('position') != 'fixed') {
        $('#search').css({
            'position': 'fixed',
            'width': '100%',
            'top': '0'
        }).addClass('hasSticky');
        $('.scroller_anchor').css('height', heightSearch);
    } else if ($(this).scrollTop() < scroller_anchor && $('#search').css('position') != 'relative') {
        $('.scroller_anchor').css('height', '0px');
        $('#search').css({
            'position': 'relative'
        }).removeClass('hasSticky');
    }
});
$(document).ready(function () {
	var qtdBolsas = $('#radio_bolsa tbody tr').find('th input:radio').attr('data-bolsas');
	$('#action_bolsa .qtd_bolsas span').html(qtdBolsas);
});

$('#radio_bolsa tbody tr').click(function () {
    $(this).find('th input:radio').prop('checked', true);
    $('#radio_bolsa tr').removeClass('selected');
    $(this).addClass('selected');
	
	var qtdBolsas = $(this).find('th input:radio').attr('data-bolsas');
	$('#action_bolsa .qtd_bolsas span').html(qtdBolsas);
    
	var searchHeight = $('#search').outerHeight();
    $('html, body').animate({
        scrollTop: $('#action_bolsa').offset().top
    }, 500);
    setTimeout(function () {
        $('#action_bolsa button').addClass('animation');
    }, 550);
    setTimeout(function () {
        $('#action_bolsa button').removeClass('animation');
    }, 1500);
});


/*
var form = $("#form-register").show();
form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    transitionEffectSpeed: "500",
    labels: {
        current: "current step:",
        next: "Próximo",
        previous: "Anterior",
		finish: "Finalizar",
        loading: "Carregando ..."
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex) {
            return true;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex) {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";

        return form.valid();
    },
    onFinishing: function (event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex) {
		var form = $('#form-register');
        jQuery.ajax({
			type: "POST",
			url: form.attr('action'),
			data: form.serialize(),
			success: function(response){
				console.log( response );
			}
		});
	}
}).validate({
    errorPlacement: function errorPlacement(error, element) {
        element.before(error);
    },
    rules: {
        alu_cpfresponsavel: {cpf: true, required: true}
    }
});
*/
jQuery.extend(jQuery.validator.messages, {
    required: "Este campo é obrigatório.",
    remote: "Por favor, corrija este campo.",
    email: "Insira um e-mail válido.",
    url: "Insira uma URL válida.",
    date: "Insira uma data válida.",
    dateISO: "Insira uma data válida (ISO).",
    number: "Insira um número válido.",
    digits: "Digite apenas dígitos.",
    creditcard: "Número de cartão inválido.",
    equalTo: "As senhas não correspondem.",
    accept: "Por favor insira um valor com uma extensão válida.",
    cpf: 'CPF inválido',
    maxlength: jQuery.validator.format("Por favor, não insira mais que {0} caracteres."),
    minlength: jQuery.validator.format("Por favor, insira pelo menos {0} caracteres."),
    rangelength: jQuery.validator.format("Por favor, insira um valor entre {0} e {1} caracteres."),
    range: jQuery.validator.format("Por favor, insira um valor entre {0} e {1}."),
    max: jQuery.validator.format("Por favor, insira um valor menor ou igual a {0}."),
    min: jQuery.validator.format("Por favor, insira um valor maior ou igual a {0}."),
});
jQuery.validator.addMethod("cpf", function (value, element) {
    value = jQuery.trim(value);

    value = value.replace('.', '');
    value = value.replace('.', '');
    cpf = value.replace('-', '');
    while (cpf.length < 11) cpf = "0" + cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i = 0; i < 11; i++) {
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11 - x
    }
    b = 0;
    c = 11;
    for (y = 0; y < 10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11 - x;
    }

    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

    return this.optional(element) || retorno;

}, "Informe um CPF válido");

$(document).ready(function () {
    $(".telefone").mask("(99) 9999-99999");
    $('.cpf').mask('000.000.000-00', {reverse: true});
});

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$("#bt_sender").click(function (e) {
	e.preventDefault();

    var nome = $("#cont_nome").val();
    var email = $("#cont_email").val();
    var telefone = $("#cont_tel").val();
    var mensagem = $("#cont_mensagem").val();
    var box_resposta = $(".box-contato-resposta");

    var resposta = "";

    if (nome === "") {
        resposta += '<div class="alert alert-danger alert-dismissible fade show alert_nome" role="alert">Por favor, digite seu nome!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    if (email === "") {
        resposta += '<div class="alert alert-danger alert-dismissible fade show alert_email" role="alert">Por favor, digite seu email!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    if (email.indexOf('@') === -1 || email.indexOf('.') === -1) {
        resposta += '<div class="alert alert-danger alert-dismissible fade show alert_email" role="alert">Insira um email válido!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
	if (telefone === "") {
        resposta += '<div class="alert alert-danger alert-dismissible fade show alert_telefone" role="alert">Por favor, digite seu telefone!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
	if (mensagem === "") {
        resposta += '<div class="alert alert-danger alert-dismissible fade show alert_mensagem" role="alert">Por favor, digite sua mensagem!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

    if (resposta === "") {
        $.ajax({
            type: 'POST',
            data: {
                "nome": nome,
                "email": email,
                "telefone": telefone,
                "mensagem": mensagem
            },
            url: 'http://homolog.bolsalivre.com/front/ajax_contato.php',
            beforeSend: function () {
                box_resposta.html('<div class="alert alert-info alert-dismissible fade show" role="alert">Enviando...</div>');
            },
            error: function () {
                box_resposta.html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Ocorreu um erro.</div>');
                resposta = "";
            },
            success: function () {
                box_resposta.html('<div class="alert alert-success alert-dismissible fade show" role="alert">Contato enviado com sucesso!</div>');
                resposta = "";
                $("#cont_nome").val("");
                $("#cont_email").val("");
                $("#cont_tel").val("");
                $("#cont_mensagem").val("");
            }
        });
    } else {
        box_resposta.html(resposta);
    }
});

//José Lira Search Fixed
$(document).ready(function() {
    //alert( $('#search').offset().top );
  
    var altura = 570;

    $(window).scroll(function() {

        if ($(window).scrollTop() > altura) {
            $("#search").css({"position": "fixed", "top": "0px","width": "100%","background-color":"#fff","border-bottom":"none"});
            $("#produtos_fixed").css({"margin-left": "50px"});
            $("#logo-fixed").css({"margin-left": "-120px","float":"left","width": "180px","height": "5px"});
        } else {
            $("#search" ).css({"position": "relative", "top": "0"});
            $("#produtos_fixed").css({"margin-left": "0px"});
            $("#logo-fixed").css({"margin-left": "20px","margin-top":"-100px","float":"left","width": "120px","height": "40px", "margin-top": "-35px"});
        }

    });

    $(window).scroll(function() {
        var altura = 570;

        if ($(window).scrollTop() < altura) {
        $("#logo-fixed").hide();
        }else{
        $("#logo-fixed").show();   
        }

    });

});


$(document).ready(function(){

    $('.dynamic').change(function(){
        if($(this).val() != '')
    {

        var select = $(this).attr("id");
        var value = $(this).val();
        var dependent = $(this).data('dependent');
        
        $.ajax({
            url:"{{ route('pageBuscaController.fetch') }}",
            method:"POST",
            data:{select:select, value:value, _token:_token, dependent:dependent},
            success:function(result)
            {
            $('#'+dependent).html(result);
            }

        })
    }
});

    $('#country').change(function(){
        $('#state').val('');
        $('#city').val('');
    });

    $('#state').change(function(){
        $('#city').val('');
    });
 
});
