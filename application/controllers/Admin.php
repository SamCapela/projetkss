<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$ci = & get_instance();
		$ci->load->model('AdminModel');
		$data['users'] = $ci->AdminModel->getUsers();
		$ci->load->helper('url');
		$data['base_url'] = base_url();
		
		
		if($value = $this->input->get('add_user'))
		$this->addUser();
		elseif($value = $this->input->get('deleted'))
		$this->deleteCustomer($value);
		else
		$this->load->view('admin', $data);
	}
	
	
	public static function addUser()
	{
		$ci = & get_instance();
		if($values = $ci->input->post('user_add'))
		{
			$ci->load->model('AdminModel');
			$result = $ci->AdminModel->addUser($values);
			if($result == true)
			{
				$ci->load->helper('url');
				$base_url = base_url();
				$redirect = $base_url.'Admin';
				header('Location: '.$redirect);
			}
		}
		$ci->load->view('admin/add_user');
	}
	
	public static function deleteCustomer($id_customer)
	{
			$ci = & get_instance();
			$ci->load->model('AdminModel');
			$result = $ci->AdminModel->deletedCustomer($id_customer);
			if($result == true)
			{
				$base_url = base_url();
				$redirect = $base_url.'Admin';
				header('Location: '.$redirect);
			}
		
	}

	
}
