<!doctype html>
<html lang="en">
<head>
<title><?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon', $this->Html->url('/../favicon.ico'));

/*for bootstrap 3*/
echo $this->Html->css('../bootstrap4.3.1/css/bootstrap.min');
echo $this->Html->script('jquery-3.3.1.min');
echo $this->Html->script('popper.min');
//echo $this->Html->script('../bootstrap4.3.1/js/bootstrap.bundle.min');
echo $this->Html->script('../bootstrap4.3.1/js/bootstrap.min');

echo $this->Html->css("mine");

echo $scripts_for_layout;

?>
</head>
<body style="background:white;">
<div class="container-fluid p-0 zMaxWidth">
	<div class="container-fluid bg-warning" style="min-height:18px;"></div>
	<div class="container-fluid" style="min-height:8px;background:#f38332;"></div>
	<div class="container-fluid bg-secondary">
		<div style="text-align:center;width:100%;">
			<?php 
			echo $this->Html->image(
				'ENAHEADER01.png', 
				array(
					'class' => 'img-fluid',
					'style' => 'width:460px;'
				)
			);
			?>
		</div>
	</div>
	<div class="container-fluid" style="min-height:10px;"></div>
	<div class="container-fluid">
		<div style="text-align:center">
			<b><font color="red"><?php echo $this->Session->flash(); ?></font> </b>
		</div>
	</div>
	<div class="container-fluid">
		<?php echo $content_for_layout; ?>
	</div>
	<div class="container-fluid zMaxWidth px-0 py-3 mt-2 bg-secondary text-white">
		<center>
			De Kleetlaan 12a 2331 Diegem Brussels Belgium EU
			Copyright &copy; 2019 All Rights Reserved.<br/>
			<a href="www.ExtremeNorthAdvertising.com">www.ExtremeNorthAdvertising.com</a> 
		</center>
	</div>
	<div class="container-fluid" style="min-height:8px;background:#f38332;"></div>
	<div class="container-fluid bg-warning" style="min-height:18px;"></div>
</div>
</body>
</html>
