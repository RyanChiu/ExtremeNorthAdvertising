<?php
//echo print_r($results, true);
$userinfo = $this->Session->read('Auth.User.Account');
echo $this->Form->create(null, array('url' => array('controller' => 'links', 'action' => 'updsite')));
?>
<table style="width:100%">
	<caption>Fields marked with an asterisk (*) are required.</caption>
	<tr>
		<td>Campaign Name:<font size="1">(for admin only)</font></td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.hostname', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>Site Name:<font size="1">(for team or seller)</font></td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.sitename', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<?php
	if ($userinfo['id'] == 2) {
	?>
	<tr>
		<td>Abbreviation:<font size="1">(for admin only)</font></td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.abbr', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td>Site URL:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.url', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>Site Contact Name:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.contactname', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>Email Address:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.email', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>Phone Numbers:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.phonenums', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>Type Of Site:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.type',
			array('type' => 'select', 'options' => $types,
				'selected' => empty($rs) ? null : $rs['Site']['type'],
				'label' => '', 'style' => 'width:390px;'
			)
		);
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>Payouts Per Type Of Sale:</td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.payouts', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td>Notes:<br/><font size="1">(FOR TERMS, OF CONTRACT, DO'S AND DONTS, CONFIDENTIAL INFO)</font></td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Site.notes', array('label' => '', 'rows' => '20', 'cols' => '70'));
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
		<?php
		echo $this->Form->submit('Update', array('style' => 'width:112px;', 'class' => 'btn btn-secondary text-light'));
		?>
		</td>
	</tr>
</table>
<?php
echo $this->Form->input('Site.id', array('type' => 'hidden'));
echo $this->Form->end();
?>
