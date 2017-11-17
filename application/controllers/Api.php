<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
        {
		parent::__construct();
				header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
                $method = $_SERVER['REQUEST_METHOD'];
                if($method == "OPTIONS") {
                die();
                }
		$this->load->database();
        }

	public function index()
	{
		echo json_encode(array('foo'=>456465,'bar'=>8879878));
	}
  // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it

 
	public function login()
	{
		$arr = $this->db->query("select *from log")->result_array();
		echo json_encode($arr);
	}
}
