<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fina extends CI_Model
{
 
    function __construct()
    {
        parent::__construct();
    }

public function saveOrderFina($purpose,$amount,$products,$paymenttype){	
$services[] = array(
	"id" => "1088",
	"quantity" => "1.00",
	"price" => "3.00"
); 
$post = array(
	"id" => 0, 
	"date" => date("Y-m-dDh:i:s"), 
	"num_pfx" => "", 
	"doc_num" => 0, 
	"purpose" => $purpose, 
	"amount" => $amount, 
	"currency" => "GEL", 
	"rate" => 1.0, 
	"store" => 1, 
	"user" => 1, 
	"project" => 1, 
	"customer" => 35, 
	"is_vat" => true, 
	"pay_type" => $paymenttype, 
	"tr_start" => "ტრანსპორტირების დაწყების ადგილი", 
	"tr_end" => "ტრანსპორტირების დასრულების ადგილი", 
	"reserved" => true, 
	"products" => $products,
	"services" => $services
);  	
$resultteails = $this->saveOrdertoFina($this->GetToken(),$post);
//var_dump($resultteails);
}	
	
public function GetQtybybarcodefina($barcode){
//$requestID = $this->GetProductidBybarcode($this->GetToken(),$barcode);	
$finaid = $this->crud_model->getfinaid($barcode);
$requestID = $finaid;
if($requestID) {
$post = array(
	"prods" => [$requestID], 
	"store" => 0,
	"price" => 3
);  	
$resultteails = $this->getProductsRestAdvance($this->GetToken(),$post);
if (empty($resultteails->rest_info[0]->rest)) {
   	return 0;	
}else{
return $resultteails->rest_info[0]->rest;
}
}else{
return 0;
}
}	

public function GetQtybyfinaid($finaid){
//$requestID = $this->GetProductidBybarcode($this->GetToken(),$barcode);	
$requestID = $finaid;
if($requestID) {
$post = array(
	"prods" => [$requestID], 
	"store" => 0,
	"price" => 3
);  	
$resultteails = $this->getProductsRestAdvance($this->GetToken(),$post);
if (empty($resultteails->rest_info[0]->rest)) {
   	return 0;	
}else{
return $resultteails->rest_info[0]->rest;
}
}else{
return 0;
}
}	
	
public function GetToken(){
$datauser = array("login" => "Api", "password" => "e6t6v7");                                                                    
$data_string = json_encode($datauser);                                                                                        
$getouthorize = curl_init('http://35.198.116.44:8082/api/authentication/authenticate');                                                                      
curl_setopt($getouthorize, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($getouthorize, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($getouthorize, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($getouthorize, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);           
$tokenresult = json_decode(curl_exec($getouthorize), true);
return $tokenresult['token'];
}	
		
public function GetProductidBybarcode($token,$barcode){
$allproduct = $this->GetProducts($token);	
foreach ($allproduct->products as $allproductlist) {
	  if($allproductlist->code == $barcode) {
		  return $allproductlist->id;
	  }
	}	
}
	
public function GetServices(){
$ch = curl_init('http://35.198.116.44:8082/api/operation/getProvidedServices'); 
$authorization = "Authorization: Bearer ".$this->GetToken(); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 0); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch); 
curl_close($ch);
return json_decode($result); 
}
	
public function GetProducts(){
$ch = curl_init('http://35.198.116.44:8082/api/operation/getProducts'); 
$authorization = "Authorization: Bearer ".$this->GetToken(); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 0); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch); 
curl_close($ch);
return json_decode($result); 
}
	
	
public function finagetrequest(){
$ch = curl_init('http://35.198.116.44:8082/api/operation/getCustomers'); 
$authorization = "Authorization: Bearer ".$this->GetToken(); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 0); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch); 
curl_close($ch);
return json_decode($result); 
}
	
public function getProductsRestAdvance($token,$post){
$ch = curl_init('http://35.198.116.44:8082/api/operation/getProductsRestAdvance'); 
$post = json_encode($post); 
$authorization = "Authorization: Bearer ".$token; 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch); 
curl_close($ch);
return json_decode($result); 
}

public function saveOrdertoFina($token,$post){
$ch = curl_init('http://35.198.116.44:8082/api/operation/saveDocCustomerOrder'); 
$post = json_encode($post);
$authorization = "Authorization: Bearer ".$token; 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch); 
curl_close($ch);
return json_decode($result); 
}
	
}
?>