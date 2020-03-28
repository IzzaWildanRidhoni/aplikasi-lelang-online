<?php
Class Welcome extends Controller{
	function index()
	{
		$data['judul']='Welcome';
		$this->view('index',$data);
	}
}