<?php

class Model
{
    protected $db;
    public $logger;
    protected $right;

    public function __construct(){
        $this->db = new DB();
        $this->logger = new Logger();
        $this->right = new Right();
    }

	public function get_data()
	{
		// todo
	}
}