<?php
	//echo "<select name='province_id' id='province_id' class='selectpicker form-control' data-style='btn-default'>";
	//echo "<option value='0'>Select Sub-District</option>";
	//foreach ($option_province as $province):	
		//echo "<option value='".$province->id."'>".$province->name."</option>";
	//endforeach;
	//echo "</select>";
	
	$misc = 'id="province_id" class="selectpicker form-control" data-style="btn-default"';
	echo form_dropdown("province_id",$option_province,'',$misc);
?>