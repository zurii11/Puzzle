<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Fina extends Controller
{

    public function gettoken()
    {
		$datauser = array("login" => "FINAWebAPI", "password" => "21FSOY");                                                                    
		$data_string = json_encode($datauser);                                                                                        
		$getouthorize = curl_init('http://185.139.57.62:8081/api/authentication/authenticate');                                                                      
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
	
	    public function getProductGroups($token)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getProductGroups'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$groups = curl_exec($ch); 
		curl_close($ch);
		return json_decode($groups); 
    }	    
	
	public function getProductsRestAdvance($token,$post)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getProductsRestAdvance'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		$result = json_decode($result); 
		return $result->rest_info[0]->rest;
    }
	
	public function saveProduct($token,$post)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/saveProduct'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		$result = json_decode($result); 
        return $result->id;
    }
	
	public function getProducts($token)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getProducts'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
	}
	
	public function getUnits($token)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getUnits'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
    }
	
	public function getVendorsByCode($token,$code)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getVendorsByCode/'. $code .''); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
    }
		
	public function getCustomersByCode($token,$code)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getCustomersByCode/'. $code .''); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
    }
	
	public function getVendors($token)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getVendors'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
    }
	
	public function getUsers($token)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getUsers'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
    }
	
	public function getStaffs($token)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getStaffs'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
    }
	
	public function getCustomers($token)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/getCustomers'); 
		$authorization = "Authorization: Bearer ".$token; 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 0); 
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch); 
		curl_close($ch);
		return json_decode($result); 
    }
	
	public function saveDocProductIn($token,$post)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/saveDocProductIn'); 
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
	
	public function saveCustomer($token,$post)
    {
		$ch = curl_init('http://185.139.57.62:8081/api/operation/saveCustomer'); 
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
	
	public function saveDocCustomerOrder($token,$post)
    {
	$ch = curl_init('http://185.139.57.62:8081/api/operation/saveDocCustomerOrder'); 
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
