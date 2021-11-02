<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('welcome');
	}
	
	public function login_proses()
	{
		if (isset($_POST)) {
			$user = $_POST['username'];
			$pwd  = $_POST['password'];
			
			$sql = $this->db->query("SELECT * FROM user WHERE email='{$user}' && password=md5('{$pwd}')");
			
			if ($sql->num_rows() > 0) {
				
				$_SESSION['user-log'] = $sql->result();
				
				return redirect('/dashboard');
				
			} else {
				return redirect('/');
			}
		}
	}
}
