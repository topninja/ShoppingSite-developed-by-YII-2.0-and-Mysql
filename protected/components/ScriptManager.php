<?php
class ScriptManager
{
	public static function RegisterAllJSFile($config=array())
	{				
		$baseUrl = Yii::app()->baseUrl; 
        $cs = Yii::app()->getClientScript();
        //$cs->registerScriptFile('//code.jquery.com/jquery-1.10.2.min.js',CClientScript::POS_END);            
        $cs->registerScriptFile($baseUrl."/assets/vendor/jquery-1.10.2.min.js",CClientScript::POS_END);            
        
        /*$cs->registerScriptFile("//code.jquery.com/ui/1.10.3/jquery-ui.js"
		,CClientScript::POS_END); */
        
        $cs->registerScriptFile($baseUrl."/assets/vendor/jquery-ui-1.11.4/jquery-ui.min.js",CClientScript::POS_END);            
        
        $js_lang=Yii::app()->functions->jsLanguageAdmin();
        $js_lang_validator=Yii::app()->functions->jsLanguageValidator();
        
        $cs->registerScript(
		  'js_lang',
		  'var js_lang = '.json_encode($js_lang).'
		  ',
		  CClientScript::POS_HEAD
		);
								
		$cs->registerScript(
		  'jsLanguageValidator',
		  'var jsLanguageValidator = '.json_encode($js_lang_validator).'
		  ',
		  CClientScript::POS_HEAD
		);

		/*$cs->registerScript(
		  'ajax_url',
		  "var ajax_url ='".Yii::app()->request->baseUrl."/admin/ajax' ",
		  CClientScript::POS_HEAD
		);*/
		
		$cs->registerScript(
		  'ajax_url',
		  "var ajax_url ='".Yii::app()->request->baseUrl."/ajax' ",
		  CClientScript::POS_HEAD
		);
				
		$cs->registerScript(
		  'front_ajax',
		  "var front_ajax ='".Yii::app()->request->baseUrl."/ajax' ",
		  CClientScript::POS_HEAD
		);
					
		$cs->registerScript(
		  'admin_url',
		  "var admin_url ='".Yii::app()->request->baseUrl."/admin' ",
		  CClientScript::POS_HEAD
		);
		
		$cs->registerScript(
		  'sites_url',
		  "var sites_url ='".Yii::app()->request->baseUrl."' ",
		  CClientScript::POS_HEAD
		);
		
		$cs->registerScript(
		  'home_url',
		  "var home_url ='".Yii::app()->createUrl('/store')."' ",
		  CClientScript::POS_HEAD
		);
		
		$cs->registerScript(
		  'upload_url',
		  "var upload_url ='".Yii::app()->request->baseUrl."/upload' ",
		  CClientScript::POS_HEAD
		);
		
		$cs->registerScript(
		  'captcha_site_key',
		  "var captcha_site_key ='".getOptionA('captcha_site_key')."' ",
		  CClientScript::POS_HEAD
		);
		
		$cs->registerScript(
		  'map_marker',
		  "var map_marker ='".FunctionsV3::getMapMarker()."' ",
		  CClientScript::POS_HEAD
		);		
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/DataTables/jquery.dataTables.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/DataTables/fnReloadAjax.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/JQV/form-validator/jquery.form-validator.min.js"
		,CClientScript::POS_END); 
					
		$cs->registerScriptFile($baseUrl."/assets/vendor/jquery.ui.timepicker-0.0.8.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/SimpleAjaxUploader.min.js"
		,CClientScript::POS_END);
		
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/iCheck/icheck.js"
		,CClientScript::POS_END); 
		$cs->registerScriptFile($baseUrl."/assets/vendor/chosen/chosen.jquery.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/markercluster.js"
		,CClientScript::POS_END); 
									
		if(!empty($config['google_key'])){
			$cs->registerScriptFile("//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=".$config['google_key']
			,CClientScript::POS_END); 
		} else {
			$cs->registerScriptFile("//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"
		    ,CClientScript::POS_END); 
		}
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/jquery.geocomplete.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/jquery.printelement.js"
		,CClientScript::POS_END); 
		$cs->registerScriptFile($baseUrl."/assets/vendor/fancybox/source/jquery.fancybox.js?ver=1"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/jquery.appear.js"
		,CClientScript::POS_END); 
			
		$cs->registerScriptFile($baseUrl."/assets/vendor/magnific-popup/jquery.magnific-popup.js"
		,CClientScript::POS_END); 
				
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/imagesloaded.pkgd.js"
		,CClientScript::POS_END); 
		$cs->registerScriptFile($baseUrl."/assets/vendor/intel/build/js/intlTelInput.js?ver=2.1.5"
		,CClientScript::POS_END); 
				
						
		/*$cs->registerScriptFile("//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
		,CClientScript::POS_END); */
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/bootstrap/js/bootstrap.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/parallax.js/parallax.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/raty/jquery.raty.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile("//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/js/bootstrap-select.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/waypoints/jquery.waypoints.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/waypoints/shortcuts/infinite.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/gmaps.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/noty-2.3.7/js/noty/packaged/jquery.noty.packaged.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/nprogress/nprogress.js"
		,CClientScript::POS_END); 
						
		$cs->registerScriptFile($baseUrl."/assets/vendor/theia-sticky-sidebar.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/readmore.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/justified-gallery/js/jquery.justifiedGallery.min.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/EasyAutocomplete/jquery.easy-autocomplete.min.js"
		,CClientScript::POS_END); 
				
		if($config['theme_time_pick']==2 || $config['website_use_time_picker']==2){
			$cs->registerScriptFile($baseUrl."/assets/vendor/timepicker.co/jquery.timepicker.js"
			,CClientScript::POS_END);
		}
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/typehead/bootstrap3-typeahead.min.js"
		,CClientScript::POS_END); 
				
		
		/*LEAFLET*/				
		if($config['map_provider']=="mapbox"){
			$cs->registerScriptFile($baseUrl."/assets/vendor/leaflet/leaflet.js"
			,CClientScript::POS_END); 					
		}	
		/*LEAFLET*/
		
		$cs->registerScriptFile($baseUrl."/assets/vendor/jquery-cookie.js"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/js/store.js?ver=3"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/js/store-v3.js?ver=3"
		,CClientScript::POS_END); 
		
		$cs->registerScriptFile($baseUrl."/assets/js/k_mapbox.js?ver=1.0"
		,CClientScript::POS_END); 
	}
	
	public static function registerAllCSSFiles($config=array())
	{
		$baseUrl = Yii::app()->baseUrl; 
		$cs = Yii::app()->getClientScript();
		$cs->registerCssFile($baseUrl.'/assets/css/store.css?ver=1.0');		
		$cs->registerCssFile('//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css');
		
		$cs->registerCssFile("//fonts.googleapis.com/css?family=Open+Sans|Podkova|Rosario|Abel|PT+Sans|Source+Sans+Pro:400,600,300|Roboto|Montserrat:400,700|Lato:400,300,100italic,100,300italic,400italic,700,700italic,900,900italic|Raleway:300,400,600,800");							 
		$cs->registerCssFile("//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i");
						
		$cs->registerCssFile($baseUrl."/assets/vendor/font-awesome/css/font-awesome.min.css");
				
		
		$cs->registerCssFile($baseUrl."/assets/vendor/colorpick/css/colpick.css");
		$cs->registerCssFile($baseUrl."/assets/vendor/iCheck/skins/all.css");
		$cs->registerCssFile($baseUrl."/assets/vendor/chosen/chosen.css");
		$cs->registerCssFile($baseUrl."/assets/vendor/fancybox/source/jquery.fancybox.css?ver=1");
		$cs->registerCssFile($baseUrl."/assets/vendor/animate.min.css");		
		$cs->registerCssFile($baseUrl."/assets/vendor/magnific-popup/magnific-popup.css");		
		$cs->registerCssFile($baseUrl."/assets/vendor/intel/build/css/intlTelInput.css");
		$cs->registerCssFile($baseUrl."/assets/vendor/rupee/rupyaINR.css");			
		
		//$cs->registerCssFile('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');	
		$cs->registerCssFile($baseUrl."/assets/vendor/bootstrap/css/bootstrap.min.css");		
				
		$cs->registerCssFile($baseUrl."/assets/vendor/raty/jquery.raty.css");	
		
		//$cs->registerCssFile("//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css");
		$cs->registerCssFile($baseUrl."/assets/vendor/ionicons-2.0.1/css/ionicons.min.css");	
		
		$cs->registerCssFile("//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/css/bootstrap-select.min.css");	
		
		$cs->registerCssFile($baseUrl."/assets/vendor/nprogress/nprogress.css");
		
		$cs->registerCssFile($baseUrl."/assets/vendor/justified-gallery/css/justifiedGallery.min.css");
		
		$cs->registerCssFile($baseUrl."/assets/vendor/EasyAutocomplete/easy-autocomplete.min.css");		
		
		/*LEAFLET*/
		if($config['map_provider']=="mapbox"){
			$cs->registerCssFile($baseUrl."/assets/vendor/leaflet/leaflet.css");			
		}
		/*LEAFLET*/
				
		//$website_use_time_picker = Yii::app()->functions->getOptionAdmin('website_use_time_picker');  		
		//if (Yii::app()->functions->getOptionAdmin('theme_time_pick')==2 || $website_use_time_picker==2){
		if($config['theme_time_pick']==2 || $config['website_use_time_picker']==2){
		   $cs->registerCssFile($baseUrl."/assets/vendor/timepicker.co/jquery.timepicker.min.css");
		}
		
		$cs->registerCssFile($baseUrl.'/assets/css/store-v2.css?ver=1.0');
		$cs->registerCssFile($baseUrl.'/assets/css/responsive.css?ver=1.0');
	}	
	
	public static function registerGlobalVariables()
	{				
		echo CHtml::hiddenField('fb_app_id',Yii::app()->functions->getOptionAdmin('fb_app_id'));
		echo CHtml::hiddenField('admin_country_set',Yii::app()->functions->getOptionAdmin('admin_country_set'));
		echo CHtml::hiddenField('google_auto_address',Yii::app()->functions->getOptionAdmin('google_auto_address'));
		echo CHtml::hiddenField('google_default_country',getOptionA('google_default_country'));
		echo CHtml::hiddenField('disabled_share_location',getOptionA('disabled_share_location'));
		
		echo CHtml::hiddenField('theme_time_pick',Yii::app()->functions->getOptionAdmin('theme_time_pick'));
		
		$website_date_picker_format=getOptionA('website_date_picker_format');
		if (!empty($website_date_picker_format)){
	        echo CHtml::hiddenField('website_date_picker_format',$website_date_picker_format);
        }
        $website_time_picker_format=yii::app()->functions->getOptionAdmin('website_time_picker_format');
        if ( !empty($website_time_picker_format)){
	        echo CHtml::hiddenField('website_time_picker_format',$website_time_picker_format);
        }
        echo CHtml::hiddenField('disabled_cart_sticky',getOptionA('disabled_cart_sticky'));
		echo "\n";
	}
	
} /*END CLASS*/