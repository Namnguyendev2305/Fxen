<?php

namespace VNXF\Imgur\Repository;

use XF\Mvc\Entity\Finder;
use XF\Mvc\Entity\Repository;

class Attach extends Repository {
	function upload_imgur($img) {
		if(isset($img)) {  
			if($img['name']=='') {   
				return "An Image Please."; 
			} else { 
				$filename = $img['tmp_name']; 
				$client_id = '9bfc52426ae4875';
				$handle = fopen($filename, "r"); 
				$data = fread($handle, filesize($filename)); 
				$pvars   = array('image' => base64_encode($data)); 
				$timeout = 30; 
				$curl = curl_init(); 
				curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
				curl_setopt($curl, CURLOPT_TIMEOUT, $timeout); 
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id)); 
				curl_setopt($curl, CURLOPT_POST, 1); 
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
				curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars); 
				$out = curl_exec($curl); 
				curl_close ($curl); 
				$pms = json_decode($out,true); 
				if(isset($pms['data']['link']) && $pms['data']['link']!="") { 
					return $pms['data']['link']; 
				} else { 
					return "There's a Problem"; 
				}  
			} 
		}
	}

}