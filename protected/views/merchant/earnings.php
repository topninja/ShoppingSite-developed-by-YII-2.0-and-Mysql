<?php 
$mtid=Yii::app()->functions->getMerchantID();
$sale_month=0;
$sale_month_count=0;
$sale_total=0;
$total_sale_count=0;
if ($earning=Yii::app()->functions->getMerchantBalanceThisMonth($mtid)){	
	$sale_month=$earning['total_w_tax']-$earning['total_commission'];
	$sale_month_count=$earning['total_order'];	
}

if ($total=Yii::app()->functions->getMerchantTotalSales($mtid)){	    
    $sale_total=$total['total_w_tax'];    
    $total_sale_count=$total['total_order'];
}
?>

<div class="earnings-wrap">

<div class="table">
  <ul>
  
  <li>
   <div class="rounded-box rounded">
     <p><?php echo t("Sales earnings this month")?>:</p>
     <h3><?php echo displayPrice(adminCurrencySymbol(),normalPrettyPrice($sale_month));?></h3>
     <P class="small"><?php echo t("From")?>:<?php echo $sale_month_count?> <?php echo t("orders")?></P>
   </div>
  </li>
  
  <?php if($merchant_type==2):?>
  <li>
   <div class="rounded-box rounded">
     <p><?php echo t("Your balance")?>:</p>
     <h3 class="merchant_total_balance"></h3>     
     <a href="<?php echo websiteUrl()."/merchant/withdrawals"?>"><?php echo t("Withdraw money")?></a>
   </div>
  </li>
  <?php endif;?>
  
  
  <li>
   <div class="rounded-box rounded">
     <p><?php echo t("Total value of your item sales")?>:</p>
     <h3><?php echo FunctionsV3::prettyPrice($sale_total);?></h3>
     <!--<P class="small"><?php echo t("based on list price of each item")?></P>-->
     <P class="small"><?php echo t("From")?>:<?php echo $total_sale_count?> <?php echo t("orders")?></P>
   </div>
  </li>
  
  </ul>
  <div class="clear"></div>
</div> <!--table-->

</div> <!--earnings-wrap-->