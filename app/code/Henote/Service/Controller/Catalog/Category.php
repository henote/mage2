<?php
namespace Henote\Service\Controller\Catalog;



class Category extends \Magento\Framework\App\Action\Action
{
	

    public function execute()
    {     
        
        //die("sadsdsds");
        
        //echo "---->>>>>>".$this->_urlBuilder->getUrl("excellence/index/add/");
        die('--------');
        
        $userData = array("username" => "user", "password" => "admin123");
        $ch = curl_init("http://127.0.0.1/mage2/rest/V1/integration/admin/token");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Content-Length: " .strlen(json_encode($userData))));
        
        $token = curl_exec($ch);
        
		$ch = curl_init("http://127.0.0.1/mage2/rest/V1/categories");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " .json_decode($token)));
        
        $result = curl_exec($ch);
        var_dump($result);
    }
    

}



