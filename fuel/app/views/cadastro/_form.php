<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Nome', 'nome', array('class'=>'control-label')); ?>

				<?php echo Form::input('nome', Input::post('nome', isset($cadastro) ? $cadastro->nome : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nome')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($cadastro) ? $cadastro->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tel', 'tel', array('class'=>'control-label')); ?>

				<?php echo Form::input('tel', Input::post('tel', isset($cadastro) ? $cadastro->tel : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tel')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>