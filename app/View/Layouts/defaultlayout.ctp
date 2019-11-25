<?php
$userinfo = $this->Session->read('Auth.User.Account');
$role = -1;//means everyone
if ($userinfo) {
	$role = $userinfo['role'];
}

$menuitemscount = 0;
$curmenuidx = 0;
?>
<!doctype html>
<html lang="en">
<head>
<title><?php echo $title_for_layout; ?></title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
echo $this->Html->meta('icon', $this->Html->url('/../favicon.ico'), array('type' => 'icon'));

/*for bootstrap 3*/
echo $this->Html->css('../bootstrap4.3.1/css/bootstrap.min');
echo $this->Html->script('jquery-3.3.1.min');
echo $this->Html->script('popper.min');
//echo $this->Html->script('../bootstrap4.3.1/js/bootstrap.bundle.min');
echo $this->Html->script('../bootstrap4.3.1/js/bootstrap.min');

/*for jQuery datapicker*/
echo $this->Html->css('jQuery/Datepicker/dp_gray');
echo $this->Html->script('jquery-ui.min');

?>

<?php 
/*for self-developed zToolkits*/
echo $this->Html->script('zToolkits');

/*for CKEditor*/
echo $this->Html->script('ckeditor/ckeditor');

/*for fancybox*/
echo $this->Html->css('jquery.fancybox.min');
echo $this->Html->script('jquery.fancybox.min');

/*for AJAX*/
echo $this->Html->script('ajax/prototype');
echo $this->Html->script('ajax/scriptaculous');

echo $scripts_for_layout;

?>
</head>
<body style="background:white;">
	<div class="container-fluid bg-warning" style="min-height:18px;"></div>
	<div class="container-fluid" style="min-height:8px;background:#f38332;"></div>
	<div class="container-fluid bg-secondary">
		<div style="text-align:center;width:100%;">
			<?php 
			echo $this->Html->image(
				'ENAHEADER.png', 
				array(
					'class' => 'img-fluid'
				)
			);
			?>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">ENA</a>
		<button class="navbar-toggler" 
			type="button" 
			data-toggle="collapse" 
			data-target="#navbarSupportedContent" 
			aria-controls="navbarSupportedContent" 
			aria-expanded="false" 
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<?php
					echo $this->Html->link('HOME',
						array('controller' => 'accounts', 'action' => 'index'),
						array('class' => 'nav-link', 'escape' => false), 
						false
					);
				?>
			</li>
			<li class="nav-item">
				<?php
					if ($role == 0) {//means an administrator
						echo $this->Html->link('<span><font>TEAM</font></span>',
							array('controller' => 'accounts', 'action' => 'lstcompanies', 'id' => -1),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
				?>
			</li>
			<li class="nav-item">
				<?php
					if ($role == 0) {//means an administrator
						echo $this->Html->link('SELLER',
							array('controller' => 'accounts', 'action' => 'lstagents', 'id' => -1),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
					if ($role == 1) {//means an office
						echo $this->Html->link('SELLER',
							array('controller' => 'accounts', 'action' => 'lstagents', 'id' => $userinfo['id']),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
				?>
			</li>
			<li class="nav-item">
				<?php
					if ($role == 0) {//means an administrator
						echo $this->Html->link('NEW MEMBERS',
							array('controller' => 'accounts', 'action' => 'lstnewmembers'),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
				?>
			</li>
			<li class="nav-item">
				<?php
					echo $this->Html->link('LINKS',
						array('controller' => 'links', 'action' => 'lstlinks'),
						array('class' => 'nav-link', 'escape' => false),
						false
					);
				?>
			</li>
			<li class="nav-item">
				<?php
					echo $this->Html->link('STATS',
						array('controller' => 'stats', 'action' => 'statscompany', 'clear' => -2),
						array('class' => 'nav-link', 'escape' => false),
						false
					);
				?>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" 
					href="#" id="navbarDropdown" 
					role="button" data-toggle="dropdown" 
					aria-haspopup="true" 
					aria-expanded="false">
				LOGS
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php
						if ($role == 2) {
							echo $this->Html->link('Submit Chat Log',
								array('controller' => 'accounts', 'action' => 'addchatlogs'),
								array('class' => 'dropdown-item', 'escape' => false), 
								false
							);
						}
						echo $this->Html->link('Chat Log',
							array('controller' => 'accounts', 'action' => 'lstchatlogs', 'id' => -1),
							array('class' => 'dropdown-item', 'escape' => false), 
							false
						);
						echo $this->Html->link('Click Log',
							array('controller' => 'links', 'action' => 'lstclickouts', 'id' => -1),
							array('class' => 'dropdown-item', 'escape' => false), 
							false
						);
					?>
					<div class="dropdown-divider"></div>
					<?php
						if ($role != 2) {
							echo $this->Html->link('Login Log',
								array('controller' => 'accounts', 'action' => 'lstlogins', 'id' => -1),
								array('class' => 'dropdown-item', 'escape' => false), 
								false
							);
						}
					?>
				</div>
			</li>
			<li class="nav-item">
				<?php
					echo $this->Html->link('GET HELP',
						array('controller' => 'accounts', 'action' => 'contactus'),
						array('class' => 'nav-link', 'escape' => false),
						false
					);
				?>
			</li>
			<li class="nav-item">
				<?php
					if ($role == 0) {//means an administrator
						echo $this->Html->link('PROFILE',
							array('controller' => 'accounts', 'action' => 'updadmin'),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
					if ($role == 1) {//means an office
						echo $this->Html->link('PROFILE',
							array('controller' => 'accounts', 'action' => 'updcompany', 'id' => $userinfo['id']),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
					if ($role == 2) {//means an agent
						echo $this->Html->link('PROFILE',
							array('controller' => 'accounts', 'action' => 'updagent', 'id' => $userinfo['id']),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
				?>
			</li>
			<li class="nav-item">
				<?php
					if ($role == 0) {//means an administrator
						echo $this->Html->link('ALERTS',
							array('controller' => 'accounts', 'action' => 'addnews'),
							array('class' => 'nav-link', 'escape' => false),
							false
						);
					}
				?>
			</li>
			<?php
			if (in_array($userinfo['id'], array(1, 2))) {//HARD CODE: means an administrator whoes id is 1 or 2
			?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" 
					href="#" id="navbarDropdownLEADS" 
					role="button" data-toggle="dropdown" 
					aria-haspopup="true" 
					aria-expanded="false">
				LEADS
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownLEADS">
					<?php
						echo $this->Html->link('Update 1',
							array('controller' => 'accounts', 'action' => 'updtoolbox', 'site' => 1),
							array('class' => 'dropdown-item', 'escape' => false), 
							false
						);
						echo $this->Html->link('Update 2',
							array('controller' => 'accounts', 'action' => 'updtoolbox', 'site' => 2),
							array('class' => 'dropdown-item', 'escape' => false), 
							false
						);
					?>
				</div>
			</li>
			<?php
			}
			?>
			<li class="nav-item">
				<?php
					echo $this->Html->link('LOGOUT',
						array('controller' => 'accounts', 'action' => 'logout'),
						array('class' => 'nav-link float-right', 'escape' => false),
						false
					);
				?>
			</li>
		</div>
	</nav>
	<div class="container-fluid">
		<center>
			<b><font color="red"><?php echo $this->Session->flash(); ?> </font> </b>
		</center>
		<div>
			<div style="float:left;text-align:left;padding:39px 0 0 13px;position:relative;height:0;width:0;font-weight:bold;color:black;">
				<?php
				echo "USER:" . $userinfo['username'];
				?>
			</div>
			<div
				style="float:right;text-align:right;padding:6px 20px 0px 0px;">
				<input type="text" value="" id="iptClock"
					style="width:240px;text-align:right;border:0;background:transparent;font-family:Arial;font-weight:bold;color:black;"
					readonly="readonly"
					onmouseover="jQuery('#divTimezoneTip').slideDown();"
					onmouseout="jQuery('#divTimezoneTip').slideUp();" />
				<div><font color="red">EST-EDT: Stats Time zone</font></div>
				<div><a href="https://www.dateandtime.com">https://www.dateandtime.com</a></div>
			</div>
			<div
				style="float:right;margin:6px 6px 0px 0px;display:none;color:black;"
				id="divTimezoneTip">
				<script language="javascript">
				document.write("Your timezone: " + calculate_time_zone() + "");
				</script>
			</div>
			<script language="javascript">
			function __zShowClock() {
				var now = new Date();
				/*
				2 a.m. on the Second Sunday in March 
				to 2 a.m. on the First Sunday of November, 
				GMT - 4 (Other time, GMT - 5)
				*/
				var secSundayInMar = new Date();
				var frtSundayInNov = new Date();
				secSundayInMar.setUTCMonth(2);
				secSundayInMar.setUTCDate(1);
				secSundayInMar.setUTCHours(2);
				secSundayInMar.setUTCMinutes(0);
				secSundayInMar.setUTCSeconds(0);
				secSundayInMar.setUTCMilliseconds(0);
				var i = 0;
				while (secSundayInMar.getUTCDay() != 0) {
					i++;
					secSundayInMar.setUTCDate(i);
				}
				secSundayInMar.setUTCDate(i + 7);
				frtSundayInNov.setUTCMonth(10);
				frtSundayInNov.setUTCDate(1);
				frtSundayInNov.setUTCHours(2);
				frtSundayInNov.setUTCMinutes(0);
				frtSundayInNov.setUTCSeconds(0);
				frtSundayInNov.setUTCMilliseconds(0)
				i = 0;
				while (frtSundayInNov.getUTCDay() != 0) {
					i++;
					frtSundayInNov.setUTCDate(i);
				}

				if (now >= secSundayInMar && now <= frtSundayInNov) {
					now.setHours(now.getHours() - 4);
				} else {
					now.setHours(now.getHours() - 5);
				};
				
				var nowStr = now.toUTCString();
				nowStr = nowStr.replace("GMT", "EDT"); //for firefox browser
				nowStr = nowStr.replace("UTC", "EDT"); //for IE browser

				//nowStr += ("(" + secSundayInMar.toUTCString() + "_" + frtSundayInNov.toUTCString() + ")");
				
				jQuery("#iptClock").val(nowStr);
				setTimeout("__zShowClock()", 1000);
			}
			__zShowClock();
			</script>
		</div>
		<div>

			<?php echo $content_for_layout; ?>

		</div>
	</div>
	<div class="container-fluid bg-secondary text-white">
		<center>
			<br/>De Kleetlaan 12a 2331 Diegem Brussels Belgium<br/>
			Copyright &copy; 2019 <a href="www.ExtremeNorthAdvertising.com">www.ExtremeNorthAdvertising.com</a> All Rights Reserved.
			<br/><br/>
		</center>
	</div>
	<div class="container-fluid" style="min-height:8px;background:#f38332;"></div>
	<div class="container-fluid bg-warning" style="min-height:18px;"></div>

	<!-- for "agent must read" -->
	<?php
	if (in_array($userinfo['role'], array(0, 1, 2)) && !$this->Session->check('switch_pass')) {
	?>
	<div style="display:none">
		<a id="attentions_link" href="#attentions_for_agents">show attentions</a>
	</div>
	<div style="display:none">
		<div id="attentions_for_agents" style="width: 800px;">
		<!--  
		<p class="p-blink" style="font:italic bolder 24px/100% Georgia;color:red;margin:0px 0px 6px 0px;">
		ATTENTION, EVERYONES: 
		</p>
		-->
			<script type="text/javascript" language="javascript">
			/*//we just don't blink the title of the alerts here
			colors = new Array(6);
			colors[0] = "#ff0000";
			colors[1] = "#ff2020";
			colors[2] = "#ff4040";
			colors[3] = "#ff6060";
			colors[4] = "#ff8080";
			colors[5] = "#ffffff";
			var clr_i = 0;
			function __blinkIt() {
				if (clr_i < colors.length) {
					jQuery(".p-blink").css("color", colors[clr_i]);
					clr_i++;
					setTimeout("__blinkIt()", 200);
				} else {
					clr_i = 0;
					setTimeout("__blinkIt()", 1200);
				}
			}
			__blinkIt();
			*/
			</script>
			<p style="padding: 3px 3px 3px 3px;">
				<?php
				echo !empty($alerts) ? $alerts : '';
				?>
			</p>

			<hr style="margin: 6px 0px 6px 0px" />
			<hr style="margin: 6px 0px 6px 0px" />

			<?php
			if (!empty($excludedsites)) {
			?>
			<p style="font-weight: bold; font-size: 14px; color: red;">
				YOUR
				<?php echo '"' . implode("\", \"", $excludedsites) . '"'; ?>
				LINKS HAVE BEEN SUSPENDED, PLEASE CONTACT <a
					href="mailto:SUPPORT@ExtremeNorthAdvertising.com"><font color="red">THE 
						GLOBALNETADVERTISING SUPPORT</font> </a> FOR MORE INFO.<br /> <a
					href="mailto:SUPPORT@ExtremeNorthAdvertising.com"><font color="red">SUPPORT@ExtremeNorthAdvertising.com</font>
				</a>
			</p>
			<div style="margin: 12px 2px 2px 2px; font-weight: bolder;">REASONS
				FOR TEMPORARY SUSPENSION</div>
			<p style="font-size: 14px; color: red;">
				<br/>
				1.SENDING LOW QUALITY SALES,  CUSTOMERS WHO DO NOT SPEND MONEY.<br/><br/>
				2.CREATING FAKE ACCOUNTS.<br/><br/>
				3.USING STOLEN CARDS.<br/><br/>
				4.TELLING CUSTOMER SITE IS FREE.<br/><br/>
				5.TELLING CUSTOMER YOU WILL MEET HIM.<br/>
			</p>
			<?php
			}
			?>

			<center><div>
				<?php
				echo $this->Html->link('<font style="font-weight:bold;font-size:20px;color:black;">LET ME IN</font>',
					"#",
					array('onclick' => 'javascript:jQuery.fancybox.close();jQuery.post(\'' 
						. $this->Html->url(array("controller" => "accounts", "action" => "pass")) 
						. '\', function(data) {});',
						'class' => 'button',
						'style' => 'text-decoration:none;',
						'escape' => false
					),
					false
				);
				?>
			</div></center>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery("a#attentions_link").fancybox({
				'type': 'inline',
				'overlayOpacity': 0.6,
				'overlayColor': '#0A0A0A',
				'modal': true
			});
			//jQuery("a#attentions_link").click();
		});
	</script>
	<?php
	}
	?>

	<?php
		echo $this->Js->writeBuffer(); 
	?>
</body>
</html>
