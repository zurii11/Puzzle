<?php

class Finaajax extends CI_Controller {
	
public function GetQtybyidajax(){
if(isset($_POST['product_id']) && !empty($_POST['product_id'])) {
	$finaid = $this->crud_model->getfinaid($_POST['product_id']);
echo $this->fina->GetQtybybarcodefina($finaid);	
}
}	
	
	
public function UpdateFinaDatabase(){
	foreach($this->fina->GetProducts()->products as $productlist){
		$this->crud_model->updatefinaidbybarcode($productlist->code,$productlist->id);
	}
	redirect(base_url() . 'index.php/admin');
}	
	
public function UpdateSursatiProductFinaQty(){
	foreach($this->fina->GetProducts()->products as $productlist){
		
		if($this->fina->GetQtybyfinaid($productlist->id) > 0) {
		$this->crud_model->updatestatusbyfina('ok',$productlist->id);
		}else{
		$this->crud_model->updatestatusbyfina('0',$productlist->id);
		}
	}
	redirect(base_url() . 'index.php/admin');
}	
public function requestfina(){
	var_dump($this->fina->finagetrequest());
}
public function GetProducts(){
	var_dump($this->fina->GetProducts());
}
public function GetServices(){
	var_dump($this->fina->GetServices());
}
}
?>