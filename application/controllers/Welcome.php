<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->model('Products_model');
		$this->load->model('Carts_model');
	}

	public function index()
	{
		// return Active users From users DB point 3.1
		$data['active_users'] = $this->Users_model->getActiveUsersCount();

		// return Active users From users Who have orders point 3.2
		$data['active_users_orders'] = $this->Users_model->activeUsersWithOrders();

		// return Active products From products DB point 3.3
		$data['active_products'] = $this->Products_model->activeProductsCount();

		// return Active products which are not ordered From products DB point 3.4
		$data['active_products_not_ordered'] = $this->Products_model->freeActiveProducts();

		// return Active products which are ordered From products DB point 3.5
		$data['active_products_ordered'] = $this->Products_model->orderedActiveProducts();

		// return Active products total prices from cart DB point 3.6
		$data['total_orders_price'] = $this->Carts_model->getTotalOrdersPrices();

		// return Active products total prices Per user from cart DB point 3.7
		$data['user_total_price'] = $this->Carts_model->getTotalOrdersPricesForUser();

		// get Rates for RON and USD based on Euro from API
		$data['euro_to_ron'] = ($this->getRates("RON")['success']) ? $this->getRates("RON")['info']['rate'] : "error in API Response";
		$data['euro_to_usd'] = ($this->getRates("RON")['success']) ? $this->getRates("USD")['info']['rate'] : "error in API Response";

		$this->load->view('welcome_message', $data);
	}

	private function getRates($to)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=".$to."&from=EUR&amount=1",
		CURLOPT_HTTPHEADER => array(
			"Content-Type: text/plain",
			"apikey: 328sH7TAcYqKIJC8vPv4rudynseamNg5"
		),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET"
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response, true);
	}
}
