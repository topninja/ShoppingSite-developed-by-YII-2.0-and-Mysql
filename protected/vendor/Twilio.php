<?php
/****
$twilio=new twilio;
$twilio->_debug=false;
$twilio->sid=$provider_info->api_username;
$twilio->auth=$provider_info->api_password;
$twilio->data['From']=$provider_info->sender_id;
$twilio->data['To']=$mobile;
$twilio->data['Body']=$sms_message;
if ($resp=$twilio->sendSMS()){
	$msg=$twilio->getSuccessXML();				
	$msg="Successul";
} else $msg=$twilio->getError();
*/

class Twilio
{
	public $sid;
	public $auth;
	public $sender;
	public $statuscallback;
	
	public $resp;
	
	public $data;
	public $uri;
	
	public $err;
	public $err_des;
	
	public $xml_resp;
	
	public $_debug=FALSE;
	
	public $services=array(
	    'sendsms'=> 'SMS/Messages.xml',
	    'sendsmsnew'=>"Messages"
	);
	
	public function connect()
	{
		$this->getURI();									
		$this->resp=file_get_contents($uri);		
		$respXml=simplexml_load_string($this->resp);						
		if (is_object($respXml))
		{
			if (!empty($respXml->Accounts->Account->Sid))
			{				
				return true;
			} else return false;
		} else return false;						
		
	}
		
	public function getURI()
	{
		$uri='';
	    $uri.="https://";
		$uri.=$this->sid;
		$uri.=":";
		$uri.=$this->auth;		
		$uri.="@api.twilio.com/2010-04-01/Accounts";
		return $uri;
	}
	
	public function getParams()
	{
		$params="";
		if (is_array($this->data) && count($this->data)>=1){        	
        	foreach ($this->data  as $key => $val) {
        		$params.="&$key=".urlencode($val);
        	}
        }
        return $params;
	}
			
	public function sendSMS()
	{		
		$uri='';				
		$uri.=$this->getURI();
		$uri.="/".$this->sid;
		$uri.="/".$this->services['sendsmsnew'];		
		
		$resp=$this->Curl($uri,$this->getParams());	
		$this->xml_resp=$resp;	
		
		if ($this->_debug==TRUE){
			echo "<h2>REQUEST</h2>".$uri.$this->getParams() ;			
		    echo "<h2>RESPONSE</h2>". $resp;			
		}		
		
		if ($resp)
		{
			$respxml=simplexml_load_string($resp);
			if ($this->_debug==TRUE){
			    dump($respxml);
			}
			if (is_object($respxml)) {				
				if ($respxml->Message->Sid)
				{ 										
					return $respxml->Message->Sid;			
				} else {
					$this->err=$respxml->RestException->Code;
					$this->err_des=$respxml->RestException->Detail;
				}
			} else {
				$this->err=1;
				$this->err_des="Invalid response";
			} 
		}
		
		return false;
	}
	
	public function Curl($uri="",$post="")
	{
		 $error_no='';
		 $ch = curl_init($uri);
		 curl_setopt($ch, CURLOPT_POST, 1);		 
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $post);		 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		 curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $resutl=curl_exec ($ch);		
		 		 		 
		 $error_no=$this->err=curl_errno($ch);
		 $this->err_des= curl_error($ch);	

		 if ($error_no==0) {
		 	 return $resutl;
		 } else return false;			 
		 curl_close ($ch);		 				 		 		 		 		 		
	}
			
	public function getError()
	{
		return "Error Code: ".$this->err ." - ".$this->err_des;
	}
	
	public function getSuccessXML()
	{
		return $this->xml_resp;
	}
		
}