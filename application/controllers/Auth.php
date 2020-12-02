<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('AuthModel');
		$this->getConnexion();
		$this->destroyConnexion();
		$this->load->view('auth/connexion');
		
	}
	
	public static function getConnexion()
	{
		$ci = & get_instance();
		if($ci->input->post('connexion'))
		{
			$value = $ci->input->post('connexion');
			$ci->load->model('AuthModel');
			$encrypt_password = hash('sha256', $value['password']);
			$reponse = $ci->AuthModel->getConnexionCustomer($value['email'], $encrypt_password);
			if($reponse == true)
			{
				$customer = $ci->AuthModel->getCustomerLogin($value['email'], $encrypt_password);
				foreach($customer as $val)
				{
					$session_data = array
					(
						'firstname'  => $val['firstname'],
						'lastname'  => $val['lastname'],
						'email'     => $val['email'],
						'id_customer' => $val['id_customer'],
						'role' => $val['role']
					);
				}

				$ci->session->set_userdata($session_data);
				$ci->load->helper('url');
				$base_url = base_url();
				$redirect = $base_url.'Invoice';
				header('Location: '.$redirect);
			}
			else
			{
				$ci->load->view('errors/connexion');
				return false;
			}
		}
	}
	
	public static function destroyConnexion()
	{
		$ci = & get_instance();
		$ci->load->helper('url');
		$base_url = base_url();
		$redirect = $base_url.'Auth';
		if($ci->input->get('destroy_connexion'))
		{
			session_destroy();
			header('Location: '.$redirect);
		}

	}
}
