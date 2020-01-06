<!--<form id="frm_table_list" method="POST" class="report uk-form uk-form-horizontal" >-->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<form id="frm_table_list" method="GET" class="report uk-form uk-form-horizontal" >

<?php echo CHtml::hiddenField('start_date',isset($_GET['start_date'])?$_GET['start_date']:"")?>
<?php echo CHtml::hiddenField('end_date',isset($_GET['end_date'])?$_GET['end_date']:"")?>

<?php 
$order_stats=Yii::app()->functions->orderStatusList2(false);    
?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Merchant Name")?></label>
  <?php 
  echo CHtml::dropDownList('merchant_id',
  isset($_GET['merchant_id'])?$_GET['merchant_id']:''
  ,
  (array)Yii::app()->functions->merchantList3(true,true)
  ,array(
    'class'=>'uk-form-width-large'
  ))
  ?>
</div>
  
<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Start Date")?></label>
  <?php echo CHtml::textField('start_date1',
  isset($_GET['start_date1'])?$_GET['start_date1']:''
  ,array(
  'class'=>'uk-form-width-large j_date',
  'data-id'=>'start_date'
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","End Date")?></label>
  <?php echo CHtml::textField('end_date1',
  isset($_GET['end_date1'])?$_GET['end_date1']:''
  ,array(
  'class'=>'uk-form-width-large j_date',
  'data-id'=>'end_date'
  ))?>
</div>

<?php 

$default=Yii::app()->functions->getCommissionOrderStatsArray();
/*if (isset($_GET['stats_id'])){	
	if (is_array($_GET['stats_id']) && count($_GET['stats_id'])>=1){
		$default='';
		foreach ($_GET['stats_id'] as $stats_val) {
			$default[]=$stats_val;
		}
	}
}*/
if (isset($_GET['merchant_id'])){	
	$default=isset($_GET['stats_id'])?$_GET['stats_id']:'';
}
?>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Status")?></label>
  <?php echo CHtml::dropDownList('stats_id[]',$default,(array)$order_stats,array(
  'class'=>"chosen uk-form-width-large",
  'multiple'=>true
  ))?>
</div>

<div class="uk-form-row">
  <label class="uk-form-label">&nbsp;</label>
  <!--<input type="button" class="uk-button uk-form-width-medium uk-button-success" value="Search" onclick="sales_summary_reload();">  -->
  <input type="submit" value="<?php echo t("Search")?>" class="uk-button uk-form-width-medium uk-button-success">
  <a href="javascript:;" rel="rptmerchantsalesummary" class="export_btn uk-button"><?php echo t("Export")?></a>
</div>  

<div style="height:20px;"></div>


<h3 style="text-align:center;"><?php echo t("Merchant Sales Summary Report")?></h3>
<?php if (isset($_GET['start_date']) || isset($_GET['end_date'])):?>
<p style="text-align:center;"><?php echo prettyDate($_GET['start_date'])." ".t("and")." ".prettyDate($_GET['end_date'])?></p>
<?php else :?>
<p style="text-align:center;"><?php echo t("As Of")?> <?php echo date("F d Y")?></p>
<?php endif;?>


<input type="hidden" name="action" id="action" value="rptMerchantSalesSummaryReport">
<input type="hidden" name="tbl" id="tbl" value="item">
<table id="table_list" class="uk-table uk-table-hover uk-table-striped uk-table-condensed">  
   <thead>
        <tr> 
            <th width="3%"><?php echo Yii::t('default',"Merchant Name")?></th>            
            <th width="3%"><?php echo Yii::t('default',"Total Sales")?></th>
            <th width="3%"><?php echo Yii::t('default',"#")?></th>
            <th width="3%"><?php echo Yii::t('default',"Total Commission")?></th>
            <th width="3%"><?php echo Yii::t('default',"Merchant Earnings")?></th>
            <!--<th width="3%"><?php echo Yii::t('default',"Approved No. Of Guests")?></th>-->
        </tr>
    </thead>
    <tbody>    
    </tbody>
    <tfoot>
      <tr id="total_row" style="color:red;font-size: 14pt;">
        <td>Total</td>
        <td id="total_sales">$0</td>
        <td id="total_order">0</td>
        <td id="total_commission">$0</td>
        <td id="total_earnings">$0</td>
      </tr>
    </tfoot>
</table>
<div class="clear"></div>
</form>
<script type="text/javascript">
  var total_sales = 0;
  var total_order = 0;
  var total_commission = 0;
  var total_earnings = 0;
  $("#total_row").hide();
  $(document).ready(function(){
    window.setTimeout(function(){
       for (var i = 2; i < document.getElementById("table_list").rows.length; i++){
          var tr = document.getElementsByTagName("tr")[i];
          var tdl = tr.getElementsByTagName("td").length;
          total_sales += parseInt(tr.getElementsByTagName("td")[1].innerHTML.substr(1));
          total_order += parseInt(tr.getElementsByTagName("td")[2].innerHTML.substr(0));
          total_commission += parseInt(tr.getElementsByTagName("td")[3].innerHTML.substr(1));
          total_earnings += parseInt(tr.getElementsByTagName("td")[4].innerHTML.substr(1));
        }
        $('#total_sales').html("$" + total_sales);
        $('#total_order').html(total_order);
        $('#total_commission').html("$" + total_commission);
        $('#total_earnings').html("$" + total_earnings);
        


        $("#total_row").fadeIn("slow");
    }, 2000);
  })
</script>