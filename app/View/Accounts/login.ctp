<center>
	<b><font color="red"><?php echo $this->Session->flash('auth'); ?> </font> </b>
	<font color="red"><?php echo $this->Session->flash(); ?> </font>
</center>
<?php
echo $this->Form->create(null, array('url' => array('controller' => 'accounts', 'action' => 'login')));
?>
<div class="container">
	<div class="form-row">
		<div class="form-group col-lg-6">
			<?php
			echo $this->Form->input(
				'Account.username', 
				array(
					'label' => 'USER',
					'id' => 'iptUsername',
					'class' => 'form-control form-control-lg', 
					'placeholder' => 'USER NAME'
				)
			);
			?>
		</div>
		<script type="text/javascript">
		jQuery("#AccountUsername").focus();
		</script>
		<div class="form-group col-lg-6">
			<?php
			echo $this->Form->input(
				'Account.password', 
				array(
					'label' => 'PASS', 
					'class' => 'form-control form-control-lg',
					'placeholder' => 'Password',
					'type' => 'password'
				)
			);
			?>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-lg-6">
			<?php
			echo $this->Form->input(
				'Account.vcode', 
				array(
					'label' => 'I AM HUMAN', 
					'class' => 'form-control form-control-lg',
					'placeholder' => 'Validation code'
				)
			);
			?>
		</div>
		<div class="form-group col-md-6">
			<script type="text/javascript">
			function __chgVcodes() {
				document.getElementById("imgVcodes").src =
					"<?php echo $this->Html->url(array('controller' => 'accounts', 'action' => 'phpcaptcha')); ?>"
					+ "?" + Math.random();
			}
			</script>
			<br/>
			<?php
			echo $this->Html->link(
				$this->Html->image(array('controller' => 'accounts', 'action' => 'phpcaptcha'),
					array(
						'style' => 'width:120px; height:65; border: 1px solid #222222; margin-top:8px;', 
						'id' => 'imgVcodes', 
						'onclick' => 'javascript:__chgVcodes();'
					)
				),
				'#',
				array('escape' => false, 'title' => 'Click to try another one.(By entering this code you help yourself prevent spam and fake login.)'),
				false
			);
			?>
		</div>
	</div>
	<center>
	<?php
	echo $this->Form->submit(
		'E N T E R',
		array(
			'class' => 'btn-lg btn-warning btn-block',
			'style' => 'max-width:640px;font-weight:bold;font-size:23px;'
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
