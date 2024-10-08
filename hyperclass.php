<?php

/**
* HYPER STUDIO API TrueWallet Gift Class
 *
 * @package   api-truewallet-gift-class
 * @author    Hyper Studio <https://www.facebook.com/pagehyperstudio>
 * @copyright Copyright (c) 2020-2021
 * @link      https://github.com/sharpaddroot/api-truewallet-gift-class
 * @version   1.0.2 (Beta)
 *
**/

class Hyper{

    public $apikey = ' '; //Njg3YWRhM2JjZWRiYzhjNjI2MzAwMzE2NDVjaGF3YW5yYXQ

    public $startpoint = 'http://hyperstudio.xyz/plugin/hypertruewalletapi.php';
    function hyperRequest($giftlink){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->startpoint.'?k='.$this->apikey.'&l='.$giftlink,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array('Content-Type: application/json',),
        ));

        $this->response = curl_exec($curl);

        curl_close($curl);
        $this->data = json_decode($this->response, true);
        return $this->data;
    }

}

?>

<?php

  include('hyperclass.php');
  $useapi = new Hyper();
  $value = $_POST['link']; //ค่าลิ้งซองของขวัญ
  $mygiftlink = str_replace(' ','',$value);
  $result = $useapi->hyperRequest($mygiftlink);
  
  if($result['code'] == '200'){ //ทำรายการสำเร็จ	
  
	  $link =  $result['link']; // https://github.com/sharpaddroot/api-truewallet-gift-class
	  $money =  $result['amount']; //9000
	  $date =  $result['date']; //23/09/2567		
    
  }else{ //ทำรายการไม่สำเร็จ		
  
	  $errormsg = $result['msg']; //แสดงข้อความ Error	
    
  }
  
 ?>
