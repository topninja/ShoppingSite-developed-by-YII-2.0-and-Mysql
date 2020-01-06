
<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/customPage/Do/Add" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/customPage/Do/AddCustom" class="uk-button"><i class="fa fa-plus"></i> <?php echo Yii::t("default","Add New Custom Link")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/customPage" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/customPage/Do/Assign" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","Assign Page")?></a>
</div>

<?php 
if (isset($_GET['id'])){
	if (!$data=Yii::app()->functions->getCustomPage($_GET['id'])){
		echo "<div class=\"uk-alert uk-alert-danger\">".
		Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
		return ;
	}
}
?>                                   

<div class="spacer"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">
<?php echo CHtml::hiddenField('action','addCustomPage')?>
<?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>
<?php if (!isset($_GET['id'])):?>
<?php echo CHtml::hiddenField("redirect",Yii::app()->request->baseUrl."/admin/customPage/Do/Add")?>
<?php endif;?>


<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Page Name")?></label>
  <?php 
  echo CHtml::textField('page_name',
  isset($data['page_name'])?$data['page_name']:""
  ,array('class'=>"uk-form-width-large",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Icon")?></label>
  <?php 
  echo CHtml::textField('icons',
  isset($data['icons'])?$data['icons']:""
  ,array('class'=>"uk-form-width-large",'placeholder'=>"eg. fa fa-info-circle"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Content")?></label>
  <?php 
  echo CHtml::textArea('content',
  isset($data['content'])?$data['content']:""
  ,array('class'=>"uk-form-width-large big-textarea",'data-validation'=>"required"))
  ?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Open in new window")?>?</label>
  <?php 
  echo CHtml::checkBox('open_new_tab',
  $data['open_new_tab']==2?true:false
  ,array('class'=>'icheck','value'=>2));
  ?>
</div>

<h2>SEO</h2>


<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","SEO Title")?></label>
  <?php 
  echo CHtml::textField('seo_title',
  isset($data['seo_title'])?$data['seo_title']:""
  ,array('class'=>"uk-form-width-large"))
  ?>
</div>
<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Meta Description")?></label>
  <?php 
  echo CHtml::textField('meta_description',
  isset($data['meta_description'])?$data['meta_description']:""
  ,array('class'=>"uk-form-width-large"))
  ?>
</div>
<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Meta Keywords")?></label>
  <?php 
  echo CHtml::textField('meta_keywords',
  isset($data['meta_keywords'])?$data['meta_keywords']:""
  ,array('class'=>"uk-form-width-large"))
  ?>
</div>


<div class="uk-form-row">
<label class="uk-form-label"><?php echo Yii::t("default","Status")?></label>
<?php echo CHtml::dropDownList('status',
isset($data['status'])?$data['status']:"",
(array)statusList(),          
array(
'class'=>'uk-form-width-medium',
'data-validation'=>"required"
))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"></label>
<input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
</div>

</form>