<?php
namespace Ki\Kho;

use pocketmine\Plugin\PluginBase;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\inventory\CraftItemEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerQuitEvent;
 
use pocketmine\utils\Config;
use Ki\Kho\commands\KhoSubCommand;
use pocketmine\event\Listener; 

class KhoTV extends PluginBase implements Listener{

  public static $instance;
  
  public static function getInstance() : self {
		return self::$instance;
	}
	
	public function onLoad() : void {
		self::$instance = $this;
	}
   public $modem = [];
	
	public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this); 
	  #$this->modem = new Config($this->getDataFolder(). "modem.yml", Config::YAML);
	  $this->data = new Config($this->getDataFolder() . "data.yml", Config::YAML);
	  $this->saveDefaultConfig();
	  $this->getServer()->getCommandMap()->register("/kho", new KhoSubCommand($this));
	}
	 public function onJoin(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    $name = $player->getName();
    
    if(!$this->data->exists($name)){
      $this->data->set($name, [
        "stone" => 0,
        "coal" => 0,
        "sat" => 0,
        "vang" => 0,
        "kc" => 0,
        "nlb" => 0,
        "dado" => 0,
        "thanhanh" => 0,
        "lapis" => 0,
        "wood" => 0,
        "paddy" => 0,
        "cactus" => 0,
        "pumpkin" => 0,
        "watermelon" => 0,
        "sugarcane" => 0,
        "beetroots" => 0,
        "carot" => 0,
        "potato" => 0
                ]);
      $this->data->save();
      #$this->modem->set($name, "off");
      #$this->modem->save();
      $this->modem[$name] = false;
        }
  }
  public function onQuit(PlayerQuitEvent $ev){
    $player = $ev->getPlayer();
    $name = $player->getName();
    $this->modem[$name] = false;
    #$this->modem->set($name, "off");
    #$this->modem->save();
   }
  public function onBreak(BlockBreakEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $modems = $this->modem[$name];
        $block = $event->getBlock();
        $id = $block->getId();
        if($modems == false){
          $player = $event->getPlayer();
          if($event->isCancelled()){
            return;
            }
          foreach($event->getDrops() as $drop){
              if($player->getInventory()->canAddItem($drop)){
                $player->getInventory()->addItem($drop);
              }else{
                $player->sendTitle("§l§a【§6Kho§a】§r Kho đồ của bạn đã full có thể bán hoặc bật tự động cho vào kho");
              }
              $event->setDrops([]);
          }
          }
        if($modems == true){
          /*
            $array = [
                4 => "stone",
                16 => "coal",
                15 => "sat",
                14 => "vang",
                56 => "kc",
                129 => "nlb",
                21 => "lapis",
                153 => "thanhanh",
                74 => "dado",
                17 => "wood",
                59 => "paddy",
                81 => "cactus",
                86 => "pumpkin",
                103 => "watermelon",
                83 => "sugarcane",
                127 => "beetroots",
                141 => "carot",
                142 => "potato"
                ];*/
            foreach($drops = $event->getDrops() as $drop) {
            /*foreach($array as $id => $type){
                if($idblock == $id){
                  if(isset($array[$block->getId()])){
                    $type = $array[$block->getId()];
                    $this->data->setNested("{$name}.{$type}", $this->data->getNested("{$name}.{$type}") + $drop->getCount());
                    $this->data->save();
                    $event->setDrops([]);
                    break;
                    }
                }else{
                  $player->getInventory()->addItem($drop)
                  break;
                }
                #}*/
                if($id == "4"){
                  $this->data->setNested("{$name}.stone", $this->data->getNested("{$name}.stone") + $drop->getCount());
                }elseif($id == "16"){
                  $this->data->setNested("{$name}.coal", $this->data->getNested("{$name}.coal") + $drop->getCount());
                }elseif($id == "15"){
                  $this->data->setNested("{$name}.sat", $this->data->getNested("{$name}.sat") + $drop->getCount());
                }elseif($id == "14"){
                  $this->data->setNested("{$name}.vang", $this->data->getNested("{$name}.vang") + $drop->getCount());
                }elseif($id == "56"){
                  $this->data->setNested("{$name}.kc", $this->data->getNested("{$name}.kc") + $drop->getCount());
                }elseif($id == "129"){
                  $this->data->setNested("{$name}.nlb", $this->data->getNested("{$name}.nlb") + $drop->getCount());
                }elseif($id == "21"){
                  $this->data->setNested("{$name}.lapis", $this->data->getNested("{$name}.lapis") + $drop->getCount());
                }elseif($id == "153"){
                  $this->data->setNested("{$name}.thanhanh", $this->data->getNested("{$name}.thanhanh") + $drop->getCount());
                }elseif($id == "74"){
                  $this->data->setNested("{$name}.dado", $this->data->getNested("{$name}.dado") + $drop->getCount());
                }elseif($id == "17"){
                  $this->data->setNested("{$name}.wood", $this->data->getNested("{$name}.wood") + $drop->getCount());
                }elseif($id == "59"){
                  $this->data->setNested("{$name}.paddy", $this->data->getNested("{$name}.paddy") + $drop->getCount()); 
                }elseif($id == "81"){
                  $this->data->setNested("{$name}.cactus", $this->data->getNested("{$name}.cactus") + $drop->getCount());
                }elseif($id == "86"){
                  $this->data->setNested("{$name}.pumpkin", $this->data->getNested("{$name}.pumpkin") + $drop->getCount());
                }elseif($id == "103"){
                  $this->data->setNested("{$name}.watermelon", $this->data->getNested("{$name}.watermelon") + $drop->getCount());
                }elseif($id == "83"){ 
                  $this->data->setNested("{$name}.sugarcane", $this->data->getNested("{$name}.sugarcane") + $drop->getCount());
                }elseif($id == "207"){
                  $this->data->setNested("{$name}.beetroots", $this->data->getNested("{$name}.stone") + $drop->getCount());
                }elseif($id == "141"){
                  $this->data->setNested("{$name}.carot", $this->data->getNested("{$name}.carot") + $drop->getCount());
                }elseif($id == "142"){
                  $this->data->setNested("{$name}.potato", $this->data->getNested("{$name}.potato") + $drop->getCount());
                }else{
                  $player->getInventory()->addItem($drop); 
                }

                $event->setDrops([]);
                $this->data->save();
              }
            }
          }
        }
      

