<?php
namespace controllers;
use libraries\Auth;
use micro\orm\DAO;
use Ajax\semantic\html\content\view\HtmlItem;
use models\Virtualhost;
use models\Server;
 
class Display extends ControllerBase{
 
	public function index(){}
				
	public function host($idhost){
		if(Auth::isAuth()){
			
		
		$this->jquery->compile($this->view);
		$this->loadView("Display/host.html");
	
		}}}			
										



