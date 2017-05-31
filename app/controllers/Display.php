<?php
namespace controllers;
use libraries\Auth;
use micro\orm\DAO;
use Ajax\semantic\html\content\view\HtmlItem;

class Display extends ControllerBase{ 
	


	public function index(){
	if(Auth::isAuth()){
		$user = Auth::getUser();
		$hosts=DAO::getAll("models\Host","idUser=".$user->getId());
		
		$hostsItems=$this->semantic->htmlItems("list-hosts");
		$hostsItems->fromDatabaseObjects($hosts, function($host){
			$item=new HtmlItem("");
			$item->addImage("public/img/host.jpg")->setSize("tiny");
			$item->addItemHeaderContent($host->getName(),"");
			return $item;
			
		});
	}
	}
}