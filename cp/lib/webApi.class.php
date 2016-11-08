<?php

class webApi {
	private $url;
	private function setUrl($url){
		$this->url = $url;
	}
	private function getUrl($uid=null){
		if(empty($uid)){
			return "http://fg-69c8cbcd.herokuapp.com/user/1";
		} else {
			return "http://fg-69c8cbcd.herokuapp.com/user/{$uid}";
		}
	}

	public function getUserInfo($uid=null){
		$requestUrl = $this->getUrl($uid);
		$userInfo = $this->sendRequest($requestUrl);

		return $userInfo;
	}

	private function sendRequest($url){
		if(empty($url)){
			return $url;
		}

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 証明書の検証を行わない
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // curl_execの結果を文字列で返す

		$response = curl_exec($curl);
		$result = json_decode($response, true);

		curl_close($curl);

		return $result;
	}
}