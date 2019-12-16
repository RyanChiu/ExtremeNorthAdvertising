<center>
	<b><font color="red"><?php echo $this->Session->flash('auth'); ?> </font> </b>
	<font color="red"><?php echo $this->Session->flash(); ?> </font>
</center>

<center>
	<?php 
	echo $this->Html->image(
		'JAMES_SANTIAGO.jpg', 
		array(
			'class' => 'img-thumbnail',
			'style' => 'width:160px;;'
		)
	);
	?>
	<div class="container-fluid">
		<font class="text-secondary font-weight-bold">Affiliate Mannager</font>
	</div>
	<div class="container-fluid">
		<font class="text-dark font-weight-bold">JAMES SANTIAGO</font>
	</div>
	<div class="container-fluid">
		<a href="mailto:jamesclarksantiago@gmail.com"><b>jamesclarksantiago@gmail.com</b></a>
	</div>
	<div class="container-fluid">
		Don't have an ENA account?
	</div>
	<div class="container-fluid">
		Email <a href="mailto:jamesclarksantiago@gmail.com"><b>jamesclarksantiago@gmail.com</b></a> to create one.
	</div>
	<div class="container-fluid">
		(Minimum 10 Agents per team required. to qualify for an Office Account.)
	</div>
	<div class="container-fluid" style="min-height:12px;">
	</div>
</center>

<?php
echo $this->Form->create(null, array('url' => array('controller' => 'accounts', 'action' => 'login')));
?>
<div class="container">
	<div class="form-row w-100">
		<label for="iptUsername" class="col-sm-3 text-right zLoginTitle">USER</label>
		<?php
		echo $this->Form->input(
			'Account.username', 
			array(
				'label' => false,
				'div' => array('class' => 'col-sm-6'),
				'id' => 'iptUsername',
				'class' => 'form-control', 
				//'placeholder' => 'USER NAME'
			)
		);
		?>
	</div>
	<div class="form-row w-100">
		<label for="iptPassword" class="col-sm-3 text-right zLoginTitle">PASS</label>
		<?php
		echo $this->Form->input(
			'Account.password', 
			array(
				'label' => false,
				'div' => array('class' => 'col-sm-6'),
				'id' => 'iptPassword',
				'class' => 'form-control',
				//'placeholder' => 'Password',
				'type' => 'password'
			)
		);
		?>
		<script type="text/javascript">
		jQuery("#AccountUsername").focus();
		</script>
	</div>
	<div class="form-row w-100">
		<label for="iptVcode" class="col-sm-3 text-right zLoginTitle">A HUMAN</label>
		<?php
		echo $this->Form->input(
			'Account.vcode', 
			array(
				'label' => false,
				'div' => array('class' => 'col-sm-6'),
				'id' => 'iptVcode',
				'class' => 'form-control',
				//'placeholder' => 'Validation code'
			)
		);
		?>
	</div>
	<div class="form-row w-100">
		<div class="container-fluid text-center">
		<?php
		echo $this->Html->link(
			$this->Html->image(array('controller' => 'accounts', 'action' => 'phpcaptcha'),
				array(
					'class' => 'rounded-pill',
					'style' => 'width:125px;margin:2px 0 3px 0;',
					'id' => 'imgVcodes', 
					'onclick' => 'javascript:__chgVcodes();'
				)
			),
			'#',
			array(
				'escape' => false, 
				'title' => 'Click to try another one.(By entering this code you help yourself prevent spam and fake login.)'
			),
			false
		);
		?>
		</div>
		<script type="text/javascript">
		function __chgVcodes() {
			document.getElementById("imgVcodes").src =
				"<?php echo $this->Html->url(array('controller' => 'accounts', 'action' => 'phpcaptcha')); ?>"
				+ "?" + Math.random();
		}
		</script>
	</div>
	<center>
	<?php
	echo $this->Form->submit(
		//'E N T E R',
		'ENTER.png',
		array(
			'class' => 'btn-lg btn-info btn-block',
			'style' => 'max-width:640px;max-height:64px;'
		)
	);
	?>
	</center>
</div>

<?php
echo $this->Form->end();
?>

<div style="margin: 0px 15px 0px 15px">
	<?php
	echo $this->element('frauddefblock');
	?>
</div>

<script type="text/javascript">
for (var i = 0; i < 10; i++) {
	jQuery(".suspended-warning").animate({opacity: 'toggle'}, "slow");
}
</script>