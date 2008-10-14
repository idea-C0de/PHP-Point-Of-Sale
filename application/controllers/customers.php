<?php
class Customers extends Secure_Area 
{
	function Customers()
	{
		parent::Secure_Area('customers');	
	}
	
	function index()
	{
		$this->load->view('customers/manage');
	}
	
	/*
	Returns a manage table based on a search. This will be called with AJAX.
	*/
	function search()
	{
		$search=$this->input->post('search');
		$manage_table=get_customer_manage_table($this->Customer->get_customers($search));
		echo $manage_table;
	}
	
	function add()
	{
		$this->edit(-1);
	}
	
	function edit($customer_id)
	{
		$data['customer_info']=$this->Customer->get_customer_info($customer_id);
		$this->load->view("customers/form",$data);
	}
	
	function delete()
	{
		$customers_to_delete=$this->input->post('ids');
		$this->Customer->delete_customers($customers_to_delete);
	}
}
?>