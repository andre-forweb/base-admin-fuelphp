function validateEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

function getMetaValue($key){
    if(typeof $key == 'undefined'){
        return null;
    }

    var $meta = document.getElementsByTagName('meta');

    for(var $i = 0, $total = $meta.length; $i < $total; $i++){
        if($meta[$i].name == $key){
            return $meta[$i].content;
        }
    }
};

function LoadPage($callback){
    var opts = {
        lines: 10,
        length: 10,
        width: 4,
        radius: 8,
        color: '#084073',
        speed: 1,
        trail: 60,
        hwaccel: true
    };

    var target = document.getElementById('boxPageLoadingImg');
    var spinner = new Spinner(opts).spin(target);

    $('#boxPageLoading').fadeIn('fast');
    $('#boxPageLoadingImg').fadeIn('fast', function(){
        if(typeof $callback == 'function'){
            $callback();
        }
    });
};

function Form($form){
    $.validator.setDefaults({
        ignore: []
    });

    if(typeof $form != 'undefined'){
        this.form = $form;
    }

    this.redirect = null;
    this.callbackSuccess = null;
    this.callbackError = null;
    this.method = 'POST'

    this.validate = function(){
        if(typeof this.form == 'undefined'){
            return false;
        }

        var $obj = this;
        var $form = this.form;

        $form.validate({ errorContainer: $form.find('p.error:last'), errorLabelContainer: $form.find('.msgErrorLabel'),
            submitHandler: function(){

                $form.find('.bgDisabledForm, .bgDisabled').show();
                $form.find('.boxLoading, .imgLoading').stop().fadeIn('fast');
                $form.find('p.error, p.errorServer').hide();
                $form.find('.btnSubmit').addClass('disabled');

                var $waitForm = setTimeout(function(){
                    $.ajax({
                        type: $obj.method,
                        data: $form.serialize(),
                        dataType: 'json',
                        url: $form.attr('action'),
                        cache: false,
                        success: function(json){
                            $('.inputToken').val(json.token);

                            if(json != null && json.status == 'ok'){

                                if($obj.redirect == null){
                                    $form.find('.bgDisabledForm, .bgDisabled').hide();
                                    $form.find('.boxLoading, .imgLoading').stop().fadeOut('fast', function(){
                                        $form.find('.btnSubmit').removeClass('disabled');
                                    });

                                } else {
                                    window.location = $obj.redirect;
                                    return false;
                                }

                                if($obj.callbackSuccess != null){
                                    $obj.callbackSuccess(json);
                                }

                            } else {

                                $form.find('.bgDisabledForm, .bgDisabled').hide();
                                $form.find('.boxLoading, .imgLoading').stop().fadeOut('fast', function(){
                                    $form.find('.btnSubmit').removeClass('disabled');
                                });

                                $form.find('.boxErrorServer').fadeIn('fast');

                                if($obj.callbackError != null){
                                    $obj.callbackError(json);
                                }

                            }

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown){

                            $form.find('.bgDisabledForm, .bgDisabled').hide();
                            $form.find('.boxLoading, .imgLoading').stop().fadeOut('fast', function(){
                                $form.find('.btnSubmit').removeClass('disabled');
                            });
                            $form.find('.boxErrorServer').fadeIn('fast');

                            if($obj.callbackError != null){
                                $obj.callbackError();
                            }

                        }
                    });
                }, 300);
            }
        });
    }
};

function Ajax($url, $objRef, $data){

    this.data = {};
    this.callbackSuccess = null;
    this.callbackError = null;
    this.method = 'POST'

    if(typeof $url != 'undefined'){
        this.url = $url;
    }

    if(typeof $objRef != 'undefined'){
        this.objRef = $objRef;
    }

    if(typeof $data != 'undefined'){
        this.data = $data;
    }

    this.send = function(){

        var $obj = this;

        if(typeof this.url == 'undefined'){
            return false;
        }

        if(typeof $obj.objRef != 'undefined'){
            $obj.objRef.find('.bgDisabled, .bgDisabledGal').show();
            $obj.objRef.find('.boxLoading, .boxLoadingGal').stop().fadeIn('fast');
            $obj.objRef.find('p.error').hide();
        }

        $obj.data.soudapaz_csrf_token = $('.inputToken').val();

        var $waitAjax = setTimeout(function(){
            $.ajax({
                type: $obj.method,
                data: $obj.data,
                dataType: 'json',
                url: $obj.url,
                cache: false,
                success: function(json){

                    if(typeof $obj.objRef != 'undefined'){
                        $obj.objRef.find('.bgDisabled, .bgDisabledGal').hide();
                        $obj.objRef.find('.boxLoading, .boxLoadingGal').stop().fadeOut('fast');
                        $obj.objRef.find('button').removeClass('disabled');
                    }

                    if(json != null && json.status == 'ok'){
                        $('.inputToken').val(json.token);
                        if($obj.callbackSuccess != null){
                            $obj.callbackSuccess(json);
                        }

                    } else {

                        $('.inputToken').val(json.token);

                        if($obj.callbackError != null){
                            $obj.callbackError(json);
                        }

                    }


                },
                error: function(XMLHttpRequest, textStatus, errorThrown){

                    if(typeof $obj.objRef != 'undefined'){
                        $obj.objRef.find('.bgDisabled, .bgDisabledGal').hide();
                        $obj.objRef.find('.boxLoading, .boxLoadingGal').stop().fadeOut('fast');
                        $obj.objRef.find('p.error').show();
                        $obj.objRef.find('button').removeClass('disabled');
                    }

                    if($obj.callbackError != null){
                        $obj.callbackError();
                    }

                }
            });
        }, 10);

    }
};

(function(){
    "use strict";

    if(! window.console){
        console = { log: function(){} };
    }

    var $baseUrl = getMetaValue('baseUrl');

    var $hash = window.location.hash;
    $hash = $hash.replace('#', '');
    if($hash != ''){
        $('.label-success.label-' + $hash).fadeIn('fast');
        window.location.hash = '';
        var $waitHide = setTimeout(function(){
            $('.label-success.label-' + $hash).fadeOut('fast');
        }, 4000);
    }

    $('#inputUsuario').val('');

    $(document).on('click', '.feedback-hide', function(){
        $(this).stop().fadeOut('fast');
        return false;
    });

    $(document).on('click', '.disabled', function($e){
        $e.stopPropagation();
        return false;
    });

    $('.dropdown-toggle').dropdown();

    $('.btn-groupPaginate button').click(function($e){
        if($(this).hasClass('active') || $(this).hasClass('disabled')){
            $e.stopPropagation();
            return;
        }
    });

    $('#menuLeft a, .btnLink, .btnList .btnEditar, h3 a').click(function(){
        if(! $(this).hasClass('btnDisabled')){
            var $location;

            if($(this).closest('div').hasClass('btn-groupPaginate')){
                $location = $(this).attr('data-uri');
            } else {
                $location = $(this).attr('href');
            }

            LoadPage(function(){
                window.location = $location;
            });
            return false;
        }
    });

    if($('#page-login').length){
        $('a.btnEsqueciSenha').click(function(){
            var $valEmail = $('#inputUsuario').val();

            if(!validateEmail($valEmail)){
                $valEmail = '';
            }

            $('#inputUsuarioSenha').val($valEmail);

            $('#formLogin').hide();
            $('#formEsqueciSenha').fadeIn('fast', function(){
                $('#inputUsuarioSenha').focus();
            });

            $('#boxLogin input.error').removeClass('error');
            $('.boxMsg p').hide();

            return false;
        });

        $('a.btnVoltarLogin').click(function(){
            $('#formEsqueciSenha').hide();
            $('#formLogin').fadeIn('fast');

            $('#formEsqueciSenha .formSucesso').hide();
            $('#formEsqueciSenha .formInit').show();

            $('#boxLogin input.error').removeClass('error');
            $('.boxMsg p').hide();

            return false;
        });

        var $validaLogin = new Form($('#formLogin'));
        $validaLogin.redirect = $baseUrl + 'admin/';
        $validaLogin.callbackError = function(json){
            $('#formLogin .errorServerLogin').show();
        };
        $validaLogin.validate();

        var $validaEsqueciSenha = new Form($('#formEsqueciSenha'));
        $validaEsqueciSenha.callbackSuccess = function(json){
            $('#formEsqueciSenha .formInit').hide();
            $('#formEsqueciSenha .formSucesso code').text(json.info);
            $('#formEsqueciSenha .formSucesso').fadeIn();
        };
        $validaEsqueciSenha.callbackError = function(json){
            $('#formEsqueciSenha .errorServerLogin').show();
        };
        $validaEsqueciSenha.validate();
    }

})();