<?php


class Controller {
	
	public $model;
	public $view;
    public $db;
    public $logger;


    function __construct()
	{
	    $this->db = new DB();
		$this->view = new View();
		$this->logger = new Logger();
	}
	
	// действие (action), вызываемое по умолчанию
	function action_index()
	{
		// todo	
	}
}
