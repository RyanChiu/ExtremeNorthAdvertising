<h1>A New Team</h1>
<?php
echo $this->Form->create(
	null, 
	array(
		'url' => array('controller' => 'accounts', 'action' => 'regcompany'),
		'id' => 'frmReg'
	)
);
?>
<table style="width:100%;border:0;">
	<caption>Fields marked with an asterisk (*) are required.</caption>
	<tr>
		<td width="222" class="search-label">Team Name : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.officename', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
		<!--  
		<td rowspan="15" align="center"><?php //echo $this->Html->image('iconGiveDollars.png', array('width' => '160')); ?></td>
		-->
	</tr>
	<tr>
		<td class="search-label">Manager's First Name : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.man1stname', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Manager's Last Name : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.manlastname', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Manager's Email : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.manemail', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Skype / Telegram : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.skypetelegram', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">User : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Account.username', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Pass : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Account.password', array('label' => '', 'style' => 'width:390px;', 'type' => 'password'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Confirm Pass : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Account.originalpwd', array('label' => '', 'style' => 'width:390px;', 'type' => 'password'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Bank Name BDO : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.banknamebdo', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Account Name : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.bankaccount', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Account # : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.banknum', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td class="search-label">SWIFT Code : </td>
		<td>
		<div style="float:left">
		<?php
		echo $this->Form->input('Company.swiftcode', array('label' => '', 'style' => 'width:390px;'));
		?>
		</div>
		<div style="float:left"><font color="red">*</font></div>
		</td>
	</tr>
	<tr>
		<td class="search-label">Routing # : </td>
		<td>
		<?php
		echo $this->Form->input('Company.routingnum', array('label' => '', 'style' => 'width:390px;'));
		?>
		</td>
	</tr>
	<tr>
		<td class="search-label">Associated Sites: </td>
		<td>
		<?php
		$selsites = array_diff($sites, $exsites);
		$selsites = array_keys($selsites);
		echo $this->Form->select('SiteExcluding.siteid',
			$sites,
			array(
				'multiple' => 'checkbox',
				'value' => $selsites
			)
		);
		?>
		</td>
	</tr>
	<tr>
		<td class="search-label">
		<?php
		echo $this->Form->input('Account.status', array('type' => 'hidden', 'value' => '-1'));//the default status if unapproved
		?>
		</td>
		<td>
		<?php
		echo $this->Form->submit('Add & New',
			array(
				'default' => 'default',
				'div' => array('style' => 'float:left;margin-right:15px;'),
				'style' => 'width:112px;',
				'onclick' => 'javascript:__changeAction("frmReg", "'
					. $this->Html->url(array('controller' => 'accounts', 'action' => 'regcompany', 'id' => -1))
					. '");' 
			)
		);
		echo $this->Form->submit('Add',
			array(
				'div' => array('style' => 'float:left;margin-right:15px;'),
				'style' => 'width:112px;',
				'onclick' => 'javascript:__changeAction("frmReg", "'
					. $this->Html->url(array('controller' => 'accounts', 'action' => 'regcompany'))
					. '");'
			)
		);
		?>
		</td>
	</tr>
</table>
<script type="text/javascript">
jQuery(":checkbox").attr({style: "border:0px;width:16px;vertical-align:middle;"});
</script>
<?php
echo $this->Form->input('Account.role', array('type' => 'hidden', 'value' => '1'));//the value 1 as being an office
echo $this->Form->input('Account.regtime', array('type' => 'hidden', 'value' => ''));//should be set to current time when saving into the DB
echo $this->Form->input('Account.online', array('type' => 'hidden', 'value' => '0'));// the value 0 means "offline"
echo $this->Form->input('Company.id', array('type' => 'hidden'));
echo $this->Form->end();
?>