<?php

namespace App\Controllers;

use \App\Models\M_api;

class Api extends BaseController
{
	private $models;

    public function __construct() {
        $this->models = new M_api();
    }

	public function savingTokenWeb($token)
	{
		$id = 1;
		$save_token = $this->models->savingTokenWeb($id, $token);
		return true;
	}

	function sendNotification(){
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $lat = $this->request->getVar('lat');
        $lng = $this->request->getVar('lng');
		$token = 'cpidj8SnvNM90bsWWnXJmv:APA91bGO5mKkXbzYkfRJNrM5GRwodDC1hSbN_WTOxPKmrxbW6fh3ecFNV19ibQ_4GyGB5pNm7WbZ83pMCCNex3T-Oxg-X8y-lJum9WRU7kC8UheE4Z7AfIt5iYWKkx6Hvoa0rhp-H_-r';
		//web
	    $url ="https://fcm.googleapis.com/fcm/send";

	    $fields=array(
	        "to"=> $token,
	        "notification"=>array(
	            "body"=> "Content",
	            "title"=> "Title",
	            "id" => $id,
	            "nama" => $nama,
	            "lat" => $lat,
	            "lng" => $lng
	        )
	    );
	    $headers=array(
	        'Authorization: key=AAAAkpcLOVY:APA91bGjHcAMs6nRBfM3Wn-lTMdeQmxzDkVOrbHdmZSc9Rn2t47oDqapp5YPq5wiqduihNKTFJJ1LtFGMnHRaW1M806rE33-Inqu-5syZd9xaZxwbn1h9cAsgeJDohZlqHwZdY6aBwlN',
	        'Content-Type:application/json'
	    );

	    $ch=curl_init();
	    curl_setopt($ch,CURLOPT_URL,$url);
	    curl_setopt($ch,CURLOPT_POST,true);
	    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
	    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($fields));
	    $result=curl_exec($ch);
	    // return $result;
	    curl_close($ch);
	    $j = ['status'=>'1', 'msg'=>'Tracking berhasil!'];
	    echo json_encode(true);
	}
}
