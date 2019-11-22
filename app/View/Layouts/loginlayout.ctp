<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<title><?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon', $this->Html->url('/../favicon.ico'));
/*for default whole page layout*/
echo $this->Html->css('main');

/*for jQuery*/
echo $this->Html->script('jQuery/Datepicker/jquery-1.3.2.min');

echo $scripts_for_layout;

?>
</head>
<body style="background:white;">
	<div class="wrapper">
		<!-- Start Border-->
		<div id="border">
			<div style="text-align:center">
				<b><font color="red"><?php echo $this->Session->flash(); ?></font> </b>
			</div>
			
			<!-- Start log in table layout -->
			<table style="border:0;background:#3c3c3c;border-spacing:0;width:100%;">
				<tbody>
					<tr>
						<td colspan="2" style="height:23px;">
						</td>
					</tr>
					<tr>
						<td colspan="2" style="vertical-align:middle;text-align:center;background:white;">
							<?php 
							echo $this->Html->image(
								'HEADER.png', array('style' => 'border:0;width:460px;')
							);
							?>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="height:23px;">
						</td>
					</tr>
					<tr>
						<td colspan="2" style="width:100%;background:white;padding:32px 0 21px 0;">
							<?php echo $content_for_layout; ?>
						</td>
					</tr>
				</tbody>
			</table>
			<!-- End log in table layout -->
			
		</div>
		<!-- End Border -->
		<!-- Start Footer -->
		<div id="footer">
			<div style="color:white;font-size:16px;font-weight:bold;">
			<center>
				<br/>De Kleetlaan 12a 2331 Diegem Brussels Belgium<br/><br/>
				Copyright &copy; 2019 <a href="www.ExtremeNorthAdvertising.com">www.ExtremeNorthAdvertising.com</a> All Rights Reserved.
				<br/><br/>
			</center>
			</div>
		</div>
		<!-- End Footer -->
	</div>
	
</body>
</html>
