<?php
namespace controllers;
use libraries\Auth;
use micro\orm\DAO;
use Ajax\semantic\html\content\view\HtmlItem;
use models\Virtualhost;
use models\Server;


class My extends ControllerBase{
	
	

	public function index(){
		if(Auth::isAuth()){
			$user = Auth::getUser();
			$hosts=DAO::getAll("models\Host","idUser=".$user->getId());
			
			$hostsItems=$this->semantic->htmlItems("list-hosts");
			$hostsItems->fromDatabaseObjects($hosts, function($host){
				
				$item=new HtmlItem("");
				$item->addImage("public/img/host.png")->setSize("tiny");
				$item->addItemHeaderContent($host->getName(),$host->getIpv4(),"");
				return $item;
				
			});
				

       
      			
      			$idUser=DAO::getAll("models\Host","idUser=".$user->getId());
      			
				$hostsItems->fromDatabaseObjects($idUser, function($id){
					$item=new HtmlItem("");
					$item->addItemHeaderContent($id->getId());
				
					$namevirtualhost=DAO::getAll("models\Virtualhost","idUser=".$id->getId());
					
					
					
					$hostsItems=$this->semantic->htmlItems("list-virtualhosts");
					$hostsItems->fromDatabaseObjects($namevirtualhost, function($namevhost){
					 
						$item=new HtmlItem("");
						$item->addImage("public/img/virtualhost.png")->setSize("tiny");
						
						$server = $namevhost->getServer("models\Virtualhost");
						echo $namevhost->getServer(), "";
						
            		$item->addItemHeaderContent($namevhost->getName(),"");
						
						
						
						return $item;
						
						
					});});
					
			
					
					
					
					$this->jquery->compile($this->view);
					$this->loadView("my/index.html");
					
					
					
					
		}
		else{
			
				$message=$this->semantic->htmlMessage("error","Merci de vous connecter pour tester.");
				$message->setIcon("announcement")->setError();
				$message->setDismissable();
				$message->addContent(Auth::getInfoUser($this,"-login"));
				echo $message;
				echo $this->jquery->compile($this->view);
			}
			
		}
		
	}

?>