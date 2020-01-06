<?php
$this->renderPartial('/front/banner-receipt',array(
   'h1'=>$data['page_name']
));
//$p = new CHtmlPurifier();
?>

<div class="sections section-grey2 section-custom-page" id="section-custom-page">  
 <div class="container">
   <!--<p><?php //echo $p->purify(stripslashes($data['content']))?></p>-->
   <p><?php echo stripslashes($data['content'])?></p>
 </div> <!--container-->
</div> <!--sections-->