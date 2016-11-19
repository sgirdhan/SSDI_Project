<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\WorkspaceSearch;
use app\models\Workspace;
use kartik\datetime\DateTimePicker;

?>

<div class="container">
	<form method="post">
		<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->getCsrfToken()?>" />
		<div class="form-group">
			<label for="workspace">Workspace</label>
			<select class="form-control" id="workspace" name="workspace_id">
				<option value=0>Select Workspace</option>
				<?php foreach($data as $key => $value): ?>
				<option value="<?=$value['WorkspaceID'];?>"><?=$value['Name'];?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="capacity">Select Capacity</label>
			<select class="form-control" id="capacity" name="capacity">
				<option value=0>Select Capacity</option>
				<?php foreach($data as $key => $value): ?>
				<option value="<?=$value['WorkspaceID'];?>"><?=$value['Capacity'];?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="capacity">Select Area</label>
			<select class="form-control" id="capacity" name="area_id">
				<option value=0>Select Area</option>
				<?php foreach($data as $key => $value): ?>
				<option value="<?=$value['WorkspaceID'];?>"><?=$value['AreaName'];?></option>
				<?php endforeach; ?>
			</select>
        </div>
        <div class="form-group">
        	<label for="start-date">Start Date</label>
        	<?= DateTimePicker::widget([
			   							 'name' => 'start_date',
			  							 'type' => DateTimePicker::TYPE_INPUT,
			   							 'pluginOptions' => [
			      							 'autoclose'=>true,
			        						 'format' => 'dd-M-yyyy hh:ii'
			   							]]);?>	
        </div>
        <div class="form-group">
        	<label for="end-date">End Date</label>
        	<?= DateTimePicker::widget([
			   							 'name' => 'end_date',
			  							 'type' => DateTimePicker::TYPE_INPUT,
			   							 'pluginOptions' => [
			      							 'autoclose'=>true,
			        						 'format' => 'dd-M-yyyy hh:ii'
			   							]]);?>	
        </div>

		<div class="form-group">
			<input type="submit" class="btn btn-primary" id="search" value="search" />
		</div>
	</form>
</div>

<?php if(!empty($results)) : ?>

<?php endif; ?>