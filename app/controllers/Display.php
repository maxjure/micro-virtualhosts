<?php
namespace controllers;
use libraries\Auth;
use micro\orm\DAO;
use Ajax\semantic\html\content\view\HtmlItem;
use models\Virtualhost;
use models\Server;
use micro\orm\creator\Model;
 
class Display extends ControllerBase{
 
	public function index(){
	if (Auth::isAuth()){
	$user = Auth::getUser();
	$serveur=DAO::getAll("models\server",)
	}
					
					
					
					
					$this->jquery->compile($this->view);
					$this->loadView("Display/host.html");
					
					
					
					
		}
		public function host($idhost){
	}
}
