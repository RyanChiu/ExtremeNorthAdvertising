<?php 
$this->Js->JqueryEngine->jQueryObject = 'jQuery';
echo $this->Html->scriptBlock(
	'',
	array('inline' => false)
);
?>

<?php
date_default_timezone_set("Asia/Bangkok");
$userinfo = $this->Session->read('Auth.User.Account');
$curaction = '';
if ($bywhat == 0) $curaction = 'statsdate';
else if ($bywhat == 1) $curaction = 'statscompany';
else if ($bywhat == 2) $curaction = "statsagent";
else if ($bywhat == 3) $curaction = 'statsagdetail';
echo $this->Form->create(
	null, 
	array(
		'url' => array('controller' => 'stats', 'action' => $curaction), 
		'id' => 'frmStats'
	)
);
?>
<table class='w-100'>
<thead>
<tr class="zBG-lessdark zTB-bordery">
	<th>
		<div style="float:left;margin-right:50px;">
		<input type="radio" name="viewby" id="viewbydate" style="width:10px;border:0px;"
		onclick='javascript:__changeAction("frmStats", "<?php echo $this->Html->url(array('controller' => 'stats', 'action' => 'statsdate')); ?>");return true;'
		<?php echo $bywhat == 0 ? 'checked' : ''; ?>
		/>
		<label for="viewbydate">View By Date</label>
		</div>
		<div style="float:left;margin-right:50px;">
		<input type="radio" name="viewby" id="viewbycompany" style="width:10px;border:0px;"
		onclick='javascript:__changeAction("frmStats", "<?php echo $this->Html->url(array('controller' => 'stats', 'action' => 'statscompany')); ?>");return true;'
		<?php echo $bywhat == 1 ? 'checked' : ''; ?>
		/>
		<label for="viewbycompany">View By Team</label>
		</div>
		<div style="float:left;margin-right:50px;">
		<input type="radio" name="viewby" id="viewbyagent" style="width:10px;border:0px;"
		onclick='javascript:__changeAction("frmStats", "<?php echo $this->Html->url(array('controller' => 'stats', 'action' => 'statsagent')); ?>");return true;'
		<?php echo $bywhat == 2 ? 'checked' : ''; ?>
		/>
		<label for="viewbyagent">View By Seller</label>
		</div>
		<?php
		if ($userinfo['role'] == 0) {
		?>
		<div style="float:left;margin-right:50px;">
		<input type="radio" name="viewby" id="viewbyagdetail" style="width:10px;border:0px;"
		onclick='javascript:__changeAction("frmStats", "<?php echo $this->Html->url(array('controller' => 'stats', 'action' => 'statsagdetail')); ?>");return true;'
		<?php echo $bywhat == 3 ? 'checked' : ''; ?>
		/>
		<label for="viewbyagdetail">Detailed</label>
		</div>
		<?php
		}
		?>
	</th>
</tr>
</thead>
<tr>
	<td>
	<div class="container-fluid row w-100">
		<div class="float-left bg-transparent" style="width:120px;">
			<b>Offer:</b>
		</div>
		<div class="float-left" style="margin-right:20px;">
		<?php
		echo $this->Form->input('Stats.siteid',
			array('label' => '',
				'options' => $sites, 'type' => 'select', 'selected' => $selsite,
				'style' => 'width:160px;',
				'onchange' => 'javascript:if (jQuery("#StatsSiteid").val() == -1) {alert("Please choose a site, or the stats will not be loaded.");return false;} else return true;'
			)
		);
		/*
		echo $ajax->observeField('StatsSiteid',
			array(
				'url' => array('controller' => 'stats', 'action' => 'switchtype'),
				'update' => 'StatsTypeid',
				'loading' => 'Element.hide(\'divTypeid\');Element.show(\'divTypeidLoading\');',
				'complete' => 'Element.show(\'divTypeid\');Element.hide(\'divTypeidLoading\');',
				'frequency' => 0.2
			)
		);
		*/
		$this->Js->get("#StatsSiteid")->event("change", $this->Js->request(
			array(
				'controller' => 'stats', 'action' => 'switchtype'
			),
			array(
				'update' => '#StatsTypeid',
				'before' => 'Element.hide(\'divTypeid\');Element.show(\'divTypeidLoading\');',
				'complete' => 'Element.show(\'divTypeid\');Element.hide(\'divTypeidLoading\');',
				'async' => true,
				'dataExpression' => true,
				'method' => 'post',
				'data' => $this->Js->serializeForm(array('isForm' => false, 'inline' => true))
			)
		));
		?>
		</div>
		<div class="float-left bg-transparent" style="width:120px;">
			<b>Link Type:</b>
		</div>
		<div class="float-left" style="margin-right:20px;">
		<?php
		echo $this->Form->input('Stats.typeid',
			array('label' => '', 'options' => $types,
				'type' => 'select', 'selected' => $seltype,
				'style' => 'width:160px;',
				'div' => array('id' => 'divTypeid')
			)
		);
		?>
		</div>
		<div id="divTypeidLoading" style="float:left;width:160px;margin-right:20px;display:none;">
		<?php echo $this->Html->image('iconAttention.gif') . '&nbsp;Loading...'; ?>
		</div>
	</td>
</tr>
<tr>
	<td>
		<div class="float-left" style="margin-right:20px;">
		<?php
		if ($userinfo['role'] == 0) {//means an administrator
		?>
		<div style="width:120px;" class="float-left bg-transparent">
			<b>Team:</b>
		</div>
		<div style="margin-right:20px;" class="float-left">
			<input id="iptComs" type="text"
				readonly="readonly"
				style="width:160px;cursor:default;"
				<?php
				$selcomnames = array();
				if (empty($selcoms) || count($selcoms) == count($coms)) {
					array_push($selcomnames, 'All');
				} else {
					foreach ($selcoms as $selcom) {
						array_push($selcomnames, $coms[$selcom]); 
					};
				}
				?>
				value="<?php echo empty($selcomnames) ? 'All' : implode(",", $selcomnames); ?>"
			/>
		</div>
		<div id="divComs" style="display:none;">
		<?php
			echo $this->Form->select('Stats.companyid',
				$coms,
				array(
					'style' => 'width:160px;',
					'multiple' => 'multiple',
					'value' => (empty($selcoms) ? 0 : $selcoms),
				)
			);
			/*
			echo $ajax->observeField('StatsCompanyid',
				array(
					'url' => array('controller' => 'stats', 'action' => 'switchagent'),
					'update' => 'StatsAgentid',
					'loading' => 'Element.hide(\'divAgentid\');Element.show(\'divAgentidLoading\');',
					'complete' => 'Element.show(\'divAgentid\');Element.hide(\'divAgentidLoading\');',
					'frequency' => 0.2
				)
			);
			*/
			$this->Js->get("#StatsCompanyid")->event("change", $this->Js->request(
				array(
					'controller' => 'stats', 'action' => 'switchagent'
				),
				array(
					'update' => '#StatsAgentid',
					'before' => 'Element.hide(\'divAgentid\');Element.show(\'divAgentidLoading\');',
					'complete' => 'Element.show(\'divAgentid\');Element.hide(\'divAgentidLoading\');',
					'async' => true,
					'dataExpression' => true,
					'method' => 'post',
					'data' => $this->Js->serializeForm(array('isForm' => false, 'inline' => true))
				)
			));
		?>
		</div>
		<script type="text/javascript">
			jQuery("#iptComs").click(function(){
				var box = jQuery("#divComs");
		        if(box != undefined){
		        	box.addClass("wbx").css({
			        	position:"absolute",
			        	left:jQuery(this).offset().left,
			        	top:jQuery(this).offset().top+jQuery(this).outerHeight()+1,
			        	zIndex:100
			        });
			        if (box.is(":hidden")) {
		        		box.show("fast");
			        } else {
			        	box.hide("fast");
			        }
		        }
			});
			jQuery("#StatsCompanyid").blur(function(){
				var box = jQuery("#divComs");
		        box.hide("fast");
			});
			jQuery("#StatsCompanyid").change(function(){
				var ipt = jQuery("#iptComs");
				var sels = new Array();
				jQuery("#StatsCompanyid").find("option:selected").each(function(i) {
					sels.push(this.text);
				})
				if (sels.length > 0 && sels.length < <?php echo count($coms);?>) {
					ipt.attr("value", sels.join(","));
				} else {
					ipt.attr("value", "All");
				}
			});
		</script>
		<div style="width:120px;" class="float-left bg-transparent">
			<b>Seller:</b>
		</div>
		<div style="margin-right:20px;" class="float-left">
		<?php
			echo $this->Form->input('Stats.agentid',
				array('label' => '',
					'options' => $ags, 'type' => 'select',
					'selected' => $selagent, 'style' => 'width:160px;',
					'div' => array('id' => 'divAgentid')
				)
			);
		?>
		</div>
		<div id="divAgentidLoading" style="float:left;width:158px;margin-right:20px;display:none;">
		<?php echo $this->Html->image('iconAttention.gif') . '&nbsp;Loading...'; ?>
		</div>
		<?php
		}
		else if ($userinfo['role'] == 1) {//means an office
			echo $this->Form->input('Stats.companyid', array('type' => 'hidden', 'value' => $userinfo['id']));
		?>
		<div style="width:120px;" class="float-left bg-transparent">
			<b>Seller:</b>
		</div>
		<div style="margin-right:20px;" class="float-left">
		<?php
			echo $this->Form->input('Stats.agentid',
				array('label' => '', 'options' => $ags, 'type' => 'select', 'selected' => $selagent, 'style' => 'width:160px;'));
		?>
		</div>
		<?php
		}
		else if ($userinfo['role'] == 2) {//means an agent
			echo $this->Form->input('Stats.companyid', array('type' => 'hidden', 'value' => 0));
			$_ags = array_keys($ags);
			echo $this->Form->input('Stats.agentid', array('type' => 'hidden', 'value' => $_ags[1]));
		}
		?>
		</div>
	</td>
</tr>
<tr>
	<td>
		<div style="width:120px;" class="float-left bg-transparent">
			<b>Start Date:</b>
		</div>
		<div style="margin-right:20px;" class="float-left">
		<?php
		echo $this->Form->input('Stats.startdate',
			array('label' => '', 'id' => 'datepicker_start', 'style' => 'width:160px;', 'value' => $startdate));
		?>
		</div>
		<div style="width:120px;" class="float-left bg-transparent">
			<b>End Date:</b>
		</div>
		<div style="margin-right:20px;" class="float-left">
		<?php
		echo $this->Form->input('Stats.enddate',
			array('label' => '', 'id' => 'datepicker_end', 'style' => 'width:160px', 'value' => $enddate));
		?>
		</div>
	</td>
</tr>
<tr>
	<td>
		<div style="width:120px;" class="float-left bg-transparent">
			<b>Pay Period:</b>
		</div>
		<div style="margin-right:20px;" class="float-left">
		<?php
		echo $this->Form->input('Stats.period',
			array(
				'id' => 'selPeriod',
				'label' => '', 'type' => 'select',
				'options' => $periods,
				'selected' => 0,
				'style' => 'width:160px;',
				'onchange' => 'javascript:__zSetFromTo("selPeriod", "datepicker_start", "datepicker_end");'
			)
		);
		?>
		</div>
		<div style="width:120px;" class="float-left">
			<b>&nbsp;</b>
		</div>
		<div style="margin-right:20px;" class="float-left">
		<?php
		echo $this->Form->submit('G O',
			array(
				'style' => 'width:160px;font-weight:bold;', 'class' => 'btn btn-secondary text-light',
				'onclick' => 'javascript:if (jQuery("#StatsSiteid").val() == -1) {alert("Please choose a site, or the stats will not be loaded.");return false;} else return true;'
			)
		);
		?>
		</div>
	</td>
</tr>
</table>
<?php
echo $this->Form->end();
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery(function() {
		jQuery('#datepicker_start').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			prevText: 'Previous Month',
			nextText: 'Next Month',
			prevBigText: '<<',
			nextBigText: '>>'
		});
	});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery(function() {
		jQuery('#datepicker_end').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			prevText: 'Previous Month',
			nextText: 'Next Month',
			prevBigText: '<<',
			nextBigText: '>>'
		});
	});
});
</script>