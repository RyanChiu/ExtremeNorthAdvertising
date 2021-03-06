<?php
//echo print_r($results, true);
$userinfo = $this->Session->read('Auth.User.Account');
echo $this->Form->create(null, array('url' => array('controller' => 'links', 'action' => 'updtype')));
?>
<table class="table-sm table-striped w-100">
	<caption>Fields marked with an asterisk (*) are required.</caption>
	<tr>
		<td width="15%">Type Name:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Type.typename', array('label' => '', 'style' => 'width:590px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td width="15%">Type Alias:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Type.typealias', array('label' => '', 'style' => 'width:590px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td width="15%">Type URL:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Type.url', array('label' => '', 'style' => 'width:590px;'));
		?>
		</div>
		<div style="float:left;margin-left:12px;">
		<?php 
		echo $this->Form->checkbox('Type.url_null', array('style' => 'border:0px;width:16px;'));
		echo "NULL";
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td width="15%">Payout(₱):</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Fee.price', array('value' => $pep[0], 'label' => '', 'type' => 'number', 'style' => 'width:590px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td width="15%">Earning($):</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Fee.earning', array('value' => $pep[1], 'label' => '', 'type' => 'number', 'style' => 'width:590px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td width="15%">Start From:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Fee.start0', array('type' => 'hidden', 'value' => $start));
		echo $this->Form->input('Fee.start', array('type' => 'text', 'value' => $start, 'label' => ''));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>
		<?php
		echo 'Activated' . $this->Form->checkbox(
			'Type.status',
			array('style' => 'border:0px;width:16px;')
		);
		?>
		</td>
		<td>
		<?php echo $this->Form->submit('Update', array('style' => 'width:112px;', 'class' => 'btn btn-secondary text-light')); ?>
		</td>
	</tr>
</table>
<?php
echo $this->Form->input('Type.id', array('type' => 'hidden'));
echo $this->Form->end();
?>
<script type="text/javascript">
jQuery(":checkbox").attr({
	style: "border: 0px; width: 16px; margin-left: 2px; vertical-align: middle;"
});
if (jQuery.trim(jQuery("#TypeUrl").val()).length > 0) {
	jQuery("#TypeUrl").attr("style", "width:590px;");
	jQuery("#TypeUrlNull").attr("checked", false);
} else {
	jQuery("#TypeUrl").attr("readonly", true);
	jQuery("#TypeUrl").attr("style", "width:590px;background:grey;");
	jQuery("#TypeUrlNull").attr("checked", true);
}
jQuery("#TypeUrlNull").click(function() {
	if (jQuery("#TypeUrlNull").attr("checked")) {
		jQuery("#TypeUrl").val("");
		jQuery("#TypeUrl").attr("readonly", true);
		jQuery("#TypeUrl").attr("style", "width:590px;background:grey;");
	} else {
		jQuery("#TypeUrl").attr("readonly", false);
		jQuery("#TypeUrl").attr("style", "width:590px;");
	}
});
</script>
