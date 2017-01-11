<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publications extends CI_Controller {


	public function index()
	{
		echo("welcome to publications crawler");
		//$this->load->view('welcome_message');
	}


	public function fetch_all_publications()
	{
		$xmlData = file_get_contents('http://apps.unep.org/repository/api/v1/views/publications_search_api?limit=20');

		$publications=json_decode($xmlData);
		foreach($publications as $publication)
		{




		}

		$curl = curl_init("http://127.0.0.1:9200/customer/external/1?pretty");
		$data = array(
			'name' => 'John'
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(json_encode($data)));

// Make the REST call, returning the result
		$response = curl_exec($curl);

		if (!$response) {
			die("Connection Failure.n");
		}
		else
			print $response;
	}


}
