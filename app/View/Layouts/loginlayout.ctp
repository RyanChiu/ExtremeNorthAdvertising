<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<title><?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon', $this->Html->url('/../fav.png'));
/*for default whole page layout*/
echo $this->Html->css('main');

/*for jQuery*/
echo $this->Html->script('jQuery/Datepicker/jquery-1.3.2.min');

echo $scripts_for_layout;

?>
</head>
<body style="background:black;">
	<div class="wrapper">
		<!-- Start Border-->
		<div id="border">
			<div style="text-align:center">
				<b><font color="red"><?php echo $this->Session->flash(); ?></font> </b>
			</div>
			
			<!-- Start log in table layout -->
			<table style="border:0;background:black;border-spacing:0;">
				<tbody>
					<tr>
						<td style="color:#dd5566;text-align:center;font-size:19px;">
						.....................~'~...................<br/>
<font color="#005599">Extreme North Advertising</font> takes affiliate marketing programs to the next level.<br/><br/>
Our affiliate program is based on a years of success in adult industry advertising.<br/><br/>
Our understanding of affilaite needs, & years of marketing experience has allowed our group to create one of most advanced Internet affiliate program in the industry 
<br/>.....................~'~...................
						</td>
						<td>
							<?php 
							echo $this->Html->image(
								'northpolelights.jpg', array('style' => 'border:0;width:730px;')
							);
							?>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="vertical-align:middle;text-align:center;">
							<?php 
							echo $this->Html->image(
								'ENAtxt.png', array('style' => 'border:0;width:921px;')
							);
							?>
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
			<div style="background:black;color:white;font-size:1;font-weight:bold;">
			<center>
			.......................................~'~...................................
				<br/>De Kleetlaan 12a 2331 Diegem Brussels Belgium<br/>
				Copyright &copy; 2019 <a href="www.ExtremeNorthAdvertising.com">www.ExtremeNorthAdvertising.com</a> All Rights Reserved.
			<br/>.......................................~'~...................................
			</center>
			</div>
		</div>
		<!-- End Footer -->
	</div>
	
</body>
</html>
