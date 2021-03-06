<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="pt" />
    <meta name="language" content="portuguese" />
    <meta name="distribution" content="Global" />
    <meta name="geo.country" content="Brasil" />
    <meta name="dc.language" content="pt" />
    <meta name="robots" content="noindex,nofollow" />
	<meta name="baseUrl" content="<?php echo $baseUrl; ?>"/>

<?php if(isset($urlRedirect)) : ?>
	<meta name="urlRedirect" content="<?php echo $urlRedirect; ?>"/>
<?php endif; ?>

	<?php echo Asset::render('css'); ?>

    <link rel="shortcut icon" href="<?php echo $baseUrl; ?>favicon.ico" />
	<link rel="icon" type="image/x-icon" href="<?php echo $baseUrl; ?>favicon.ico" />
</head>
<body id="page-login">
    <div id="wrapperLogin">
        <div class="page-header">
        	<h1><?php echo Asset::img('logo.png', array('alt' => 'Tboom')); ?></h1>
        </div>
		<div id="boxLogin">
			<?php echo Form::open(array('action' => 'admin/login/', 'id' => 'formLogin', 'class' => 'well well-large', 'method' => 'POST', 'role' => 'form')); ?>
				<h2>Login</h2>

				<fieldset class="formInit">
					<div class="form-group has-feedback">
						<label class="control-label" for="inputUsuario"><span class="glyphicon glyphicon-color-gray glyphicon-envelope"></span>E-mail:</label>
						<?php echo Form::input('email', null, array('id' => 'inputUsuario', 'class' => 'form form-control email required', 'placeholder' => 'email@email.com')); ?>
						<br clear="all">
					</div>

					<div class="form-group">
						<label class="control-label" for="inputSenha"><span class="glyphicon glyphicon-color-gray glyphicon-asterisk"></span>Senha:</label>
						<?php echo Form::password('password', null, array('id' => 'inputSenha', 'class' => 'form form-control required', 'placeholder' => 'digite sua senha')); ?>
						<br clear="all">
					</div>

					<div class="checkbox">
						<?php echo Form::checkbox('remember', '1', null, array('id' => 'inputRemember')); ?>
						<label for="inputRemember">Lembrar senha</label>
						<br clear="all" />
					</div>

					<!-- <div class="boxMsg">
						<a href="#" class="btnEsqueciSenha"><span class="glyphicon glyphicon-space glyphicon-edit"></span>Esqueci minha senha</a>
						<p class="error feedback-hide">Preencha os campos em vermelho.</p>
						<p class="errorServer errorServerLogin feedback-hide">Usuário ou senha inválidos.</p>
						<div class="imgLoading"><?php echo Asset::img('loading-blue-disabled.gif'); ?></div>
					</div> -->

					<div class="boxInputSubmit">
						<?php echo Form::submit('submit', 'Entrar', array('id' => 'inputSubmit', 'class' => 'btn btn-primary btnSubmit')); ?>
						<div class="imgLoading imgLoadingBlue"><?php echo Asset::img('loading-blue-disabled.gif'); ?></div>
					</div>
					<br clear="all" />

					<div class="boxMsg">
						<p class="bg-danger"><button type="button" class="close" aria-hidden="true">&times;</button> Preencha corretamente os campos marcados.</p>
					</div>

				</fieldset>

				<div class="bgDisabled" title="Enviando o formulário, aguarde...">&nbsp;</div>
				<div class="msgErrorLabel">&nbsp;</div>
				<div class="csrf-item"><?php echo Form::csrf(); ?></div>
			<?php echo Form::close(); ?>

			<?php echo Form::open(array('action' => 'admin/login/senha/', 'id' => 'formEsqueciSenha', 'class' => 'well well-large', 'method' => 'POST')); ?>
				<h2>Esqueci minha senha</h2>
				<div class="formInit">
					<label for="inputUsuarioSenha">E-mail:</label>
					<?php echo Form::input('email', null, array('id' => 'inputUsuarioSenha', 'class' => 'form email required')); ?>
					<br clear="all" />

					<div class="boxMsg">
						<a href="#" class="btnVoltarLogin"><i class="icon-chevron-left"></i>Login</a>
						<p class="error">Preencha os campos em vermelho.</p>
						<p class="errorServer errorServerLogin feedback-hide">E-mail não encontrado.</p>
						<div class="imgLoading"><?php echo Asset::img('loading-blue-disabled.gif'); ?></div>
					</div>
					<?php echo Form::submit('submit', 'Recuperar senha', array('id' => 'inputSubmitSenha', 'class' => 'btn btn-primary btn-large btnSubmit')); ?>
					<br clear="all" />
				</div>
				<div class="formSucesso">
					<p><span class="label label-success">Sucesso!</span> Em breve enviaremos um e-mail para <code>email@email.com</code> com as instruções para recuperar sua senha.</p>
					<a href="#" class="btnVoltarLogin"><i class="icon-chevron-left"></i>Voltar para o Login</a>
				</div>
				<div class="bgDisabled">&nbsp;</div>
				<div class="msgErrorLabel">&nbsp;</div>
				<div class="csrf-item"><?php echo Form::csrf(); ?></div>
			<?php echo Form::close(); ?>
			<div class="boxLinkHome">
				<a class="link-opacity" href="<?php echo $baseUrl; ?>"><span class="glyphicon glyphicon-space glyphicon-home"></span>Voltar para a home do site</a>
			</div>
		</div>
        <div id="boxFooter">
            <p class="infoFooter">Copyright 2014</p>
        </div>
    </div>

    <?php echo Asset::render('js'); ?>
</body>
</html>