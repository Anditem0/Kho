<?php

namespace Ki\Kho\commands;
use pocketmine\player\Player;
use pocketmine\plugin\PluginOwned;
use pocketmine\command\{ Command, CommandSender};
use Ki\Kho\KhoTV;
use Ki\Kho\form\FormManager;

class KhoSubCommand extends Command implements PluginOwned{
  
  private KhoTV $plugin;
  
  public function __construct(KhoTV $plugin){
    
		$this->plugin = $plugin;
		parent::__construct("kho", "Mở Giao Điện Kho Cá Nhân", null, ["openkho", "mokho", "motuido", "tuido"]);
	}
	public function execute(CommandSender $sender, string $label, array $args){
		if($sender instanceof Player){
		  $form = new FormManager($this->getOwningPlugin());
		  $form->giaoDienKho($sender);
		  
		}
	}
	public function getOwningPlugin() : KhoTV {
		return $this->plugin;
	} 
}
