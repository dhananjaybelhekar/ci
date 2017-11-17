<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
        {
        header('Access-Control-Allow-Origin: *');
                header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
                $method = $_SERVER['REQUEST_METHOD'];
                if($method == "OPTIONS") {
                die();
                }
        }

	public function index()
	{
		echo json_encode(array('foo'=>456465,'bar'=>8879878));
	}
		public function logout()
	{
		$this->load->database();
		$req = json_decode($this->input->raw_input_stream);	
		if(isset($req->result))
		{
			$qr =$this->db->delete('log', array('fingerprint' =>$req->result));
			// $this->db->query($qr);
			$arr= array();
			if($qr){
				$arr['url']= 'login';		
				$arr['success']= true;
			}
			echo json_encode($arr);
		}
	}
	public function login()
	{
		$this->load->database();
		$arr = $this->db->query("select *from log")->result_array();
		echo json_encode($arr);
	}
}
