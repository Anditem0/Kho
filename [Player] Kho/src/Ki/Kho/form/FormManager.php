<?php
namespace Ki\Kho\form;

use pocketmine\player\Player;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\item\ItemFactory;
use pocketmine\inventory\Inventory; 
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\ModalForm;
use jojoe77777\FormAPI\CustomForm;
use onebone\economyapi\EconomyAPI;
use Ki\Kho\KhoTV;


class FormManager {
  
  public function giaoDienKho(Player $player){
    $form = new SimpleForm(function 
    (Player $player, $data = null){
      $result = $data;
      if ($result === null) {
        return false;
            }
      switch ($result) {
        case 0:
          $this->ShowKhoForm($player);
          break;
        case 1;
          $this->MenuRut($player);
          break;
        case 2: 
          $this->ManagerForm($player);
          break;
        case 3:
          $this->SellForm($player);
          break;
      }
    });
    $form->setTitle("§l§c•§9 Giao Diện Kho Đồ §c•");
    $form->addButton("§l§c•§9 Xem Đồ Kho §c•", 0, "textures/ui/xemkho");
    $form->addButton("§l§c•§9 Lấy Đồ Trong Kho §c•", 0, "textures/ui/laydo");
    $form->addButton("§l§c•§9 Quản Lí Tính Năng §c•", 0, "textures/ui/quanlytinhnang");
    $form->addButton("§l§c•§9 Bán Đồ Trong Kho §c•", 0, "textures/ui/bando");
    $form->sendToPlayer($player);
  }
  public function MenuRut(Player $player){
    $form = new SimpleForm(function(Player $player, $data = null){
      $result = $data;
        if ($result === null) {
          return true;
            }
        switch ($result) {
          case 0:
            $this->MenuRutKs($player);
            break;
          case 1:
            $this->MenuRutNSZ($player);
            break;
            }
    });
    $form->setTitle("§l§c•§9 Giao Diện Kho Khoáng Sản §c•");
    $form->addButton("§l§c•§9 Lấy Khoáng Sản §c•", 0, "textures/ui/khoansan");
    $form->addButton("§l§c•§9 Lấy Nông Sản §c•", 0, "textures/ui/nongsan");
    $form->sendToPlayer($player);
  }
  public function MenuRutKS(Player $player){
    $form = new SimpleForm(function(Player $player, $data = null){ 
      $result = $data;
      if($result === null) {
        $this->giaoDienKho($player);
        return false;
            }
      switch ($result) {
        case 0:
          $this->DRutKS($player, "");
                    break;
        case 1:
          $this->DRutKs($player, "");
          break;
        case 2:
          $this->DRutKS($player, "");
          break;
        case 3:
          $this->DRutKS($player, "");
          break;
        case 4:
          $this->DRutKS($player, "");
          break;
        case 5:
          $this->DRutKS($player, "");
          break;
        case 6:
          $this->DRutKS($player, "");
          break;
        case 7:
          $this->DRutKS($player, "");
          break;
        case 8:
          $this->DRutKS($player, "");
          break;
        case 9:
          $this->DRutKS($player, "");
          break;
        case 10:
          $this->DRutKS($player, "");
          break;
        case 11:
          $this->DRutKS($player, "");
          break;
        case 12:
          $this->DRutKS($player, "");
          break;
        case 13:
          $this->DRutKS($player, "");
          break;
        case 14:
          $this->DRutKS($player, "");
          break;
            } 
    });
    $name = $player->getName();
    $form->setTitle("§l§c•§9 Rút Khoáng Sản §c•");
    $form->setContent("§l§c•§e Chọn khoáng sản bạn cần rút:");
    $form->addButton("§l§c•§9 Đá Cuội §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.stone") . " §c•", 0, "textures/ui/da");
    $form->addButton("§l§c•§9 Than §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.coal") . " §c•", 0, "textures/ui/than");
    $form->addButton("§l§c•§9 Sắt §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.sat") . " §c•", 0, "textures/ui/sat");
    $form->addButton("§l§c•§9 Vàng §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.vang") . " §c•", 0, "textures/ui/vang");
    $form->addButton("§l§c•§9 Kim Cương §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.kc") . " §c•", 0, "textures/ui/diamond");
    $form->addButton("§l§c•§9 Ngọc Lục Bảo §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.nlb")  . " §c•", 0, "textures/ui/ngoclucbao");
    $form->addButton("§l§c•§9 Lưu Ly §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.lapis") . " §c•", 0, "textures/ui/luuly");
    $form->addButton("§l§c•§9 Đá Đỏ  §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.dado") . " §c•", 0, "textures/ui/dado");
    $form->addButton("§l§c•§9 Thạch anh §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name}.thanhanh") . " §c•", 0, "textures/ui/thachanh");
    $form->sendToPlayer($player);
  }
  public function MenuRutNSZ(Player $player){
    $form = new SimpleForm(function(Player $player, $data = null){ 
      $result = $data;
      if($result === null) {
        $this->giaoDienKho($player);
        return false;
            }
      switch ($result) {
        case 0:
          $this->DRutNS($player, "");
                    break;
        case 1:
          $this->DRutNS($player, "");
          break;
        case 2:
          $this->DRutNS($player, "");
          break;
        case 3:
          $this->DRutNS($player, "");
          break;
        case 4:
          $this->DRutNS($player, "");
          break;
        case 5:
          $this->DRutNS($player, "");
          break;
        case 6:
          $this->DRutNS($player, "");
          break;
        case 7:
          $this->DRutNS($player, "");
          break;
        case 8:
          $this->DRutNS($player, "");
          break;
        case 9:
          $this->DRutNS($player, "");
          break;
        case 10:
          $this->DRutNS($player, "");
          break;
        case 11:
          $this->DRutNS($player, "");
          break;
        case 12:
          $this->DRutNS($player, "");
          break;
        case 13:
          $this->DRutNS($player, "");
          break;
        case 14:
          $this->DRutNS($player, "");
          break;
            } 
    });
    $name = $player->getName();
    $form->setTitle("§l§c•§9 Rút Khoáng Sản §c•");
    $form->setContent("§l§c•§e Chọn Nông Sản bạn cần rút:");
    $form->addButton("§l§c•§9 Gỗ §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.wood") . " §c•", 0, "textures/ui/go");
    $form->addButton("§l§c•§9 Lúa Mạng §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.paddy") . " §c•", 0, "textures/ui/lua");
    $form->addButton("§l§c•§9 Xương Rồng §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.cactus  ") . " §c•", 0, "textures/ui/xuongrong");
    $form->addButton("§l§c•§9 Bí Ngô §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.pumpkin") . " §c•", 0, "textures/ui/bingo");
    $form->addButton("§l§c•§9 Dưa Hấu §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.watermelon") . " §c•", 0, "textures/ui/duahau");
    $form->addButton("§l§c•§9 Mía §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.sugarcane") . " §c•", 0, "textures/ui/mia");
    $form->addButton("§l§c•§9 Củ Cải §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.beetroots") . " §c•", 0, "textures/ui/beetroots");
    $form->addButton("§l§c•§9 Cà Rốt  §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.carot") . " §c•", 0, "textures/ui/carot");
    $form->addButton("§l§c•§9 Khoai Tây §c•\n§l§c•§9 Số lượng: §e" . KhoTV::getInstance()->data->getNested("{$name }.potato ") . " §c•", 0, "textures/ui/khoaitay");
  }
  public function additem(Player $player, int $id, int $count){
        $player->getInventory()->addItem(ItemFactory::getInstance()->get($id, $count));
    }
  public function DRutNS(Player $player){
    $form = new CustomForm(function(Player $player, $data = null){ 
      if ($data == null) {
        $this->giaoDienKho($player);
                return false;
            }
      switch ($data[2]) {
        case 0:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.wood") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.wood") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.wood", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 17, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." gỗ thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ gỗ để rút\n");
                    }
            break;
        case 1:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.paddy") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.paddy") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.paddy", $amount);
            $hatgiong = $data[1] / 3;
            $lua = $data[1] - $hatgiong;
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 296, 0, $lua));
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 295, 0, $hatgiong));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Lúa Mì và hạt giống thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Lúa Mì để rút\n");
                    }
            break; 
        case 2:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.cactus") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.cactus") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.cactus", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 81, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Xương Rồng thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Xương Rồng để rút\n");
                    }
            break;
        case 3: 
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.pumpkin") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.pumpkin") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.pumpkin", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 86, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Bí Ngô thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Bí Ngô để rút\n");
                    }
            break;
        case 4:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.watermelon") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.watermelon") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.watermelon", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 360, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Dưa Hấu thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Dưa Hấu để rút\n");
                    }
            break; 
        case 5:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.sugarcane") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.sugarcane") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.sugarcane", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 338, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Mía thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Mía để rút\n");
                    }
            break;
        case 6:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.beetroots") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.beetroots") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.beetroots", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 434, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." beetroots thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $this->DRutNS($player, "§l§c•§c Bạn không đủ Củ Cải Đỏ để rut\n");
                    }
            break; 
        case 7:
          if($count = $this->data->getNested("{$player->getName()}.carot") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.carot") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.carot", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 391, 0, $data[1]));
            $this->DRutNS($player, "§l§c•§a Bạn đã rút ".$data[1]." Cà Rốt thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $this->DRutNS($player, "§l§c•§c Bạn không đủ Cà Rốt để rút\n");
                    }
            break; 
        case 8:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.potato ") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.potato") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.potato", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 392, 0, $data[1]));
            $this->DRutNS($player, "§l§c•§a Bạn đã rút ".$data[1]." Khoai Tây thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $this->DRutNS($player, "§l§c•§c Bạn không đủ Khoai Tây để rút\n");
                    }
            break; 
      }
      
      
    });
    $form->setTitle("§l§c•§9 Rút Nông Sản §c•");
    $form->addLabel("§l§c•§a Chọn Nông Sản và số lượng bạn cần rút");
    $form->addSlider("§l§c•§a Số lượng", 1, 64, 1);
    $form->addDropdown("§l§c•§e Chọn khoáng sản", ["§rGỗ", "§rLúa", "§rXương Rồng", "§rBí Ngô", "§rDưa Hấu", "§rMía", "§rbeetroots", "§rCà rốt", "§rKhoai tây"]);
    $form->sendToPlayer($player);
  }
  public function DRutKS(Player $player){
    $form = new CustomForm(function(Player $player, $data = null){ 
      if ($data === null) {
        $this->giaoDienKho($player);
                return false;
            }
      switch ($data[2]) {
        case 0:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.stone") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.stone") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.stone", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 4, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." đá cuội thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ đá cuội để rút\n");
            }
            break;
        case 1:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.coal") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.coal") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.coal", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 263, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Than Đá thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Than Đá để rút\n");
                    }
            break; 
        case 2:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.sat") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.sat") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.sat", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 15, 0 , $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Sắt thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Sắt để rút\n");
                    }
            break;
        case 3:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.vang") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.vang") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.vang", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 14, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Vàng thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Vàng để rút\n");
                    }
            break;
        case 4: 
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.kc") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.diamod") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.kc", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 264, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Kim Cương thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Kim Cương để rút\n");
                    }
            break;
        case 5:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.nlb") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.nlb") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.nlb", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 388, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Ngọc lục bảothành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ ngọc lục bảo để rút\n");
                    }
            break; 
        case 6:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.lapis") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.lapis") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.lapis", $amount);;
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 351, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Lưu ly thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Lưu Ly để rút\n");
                    }
            break;
        case 7:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.dado") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.dado") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.dado", $amount);
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 331, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Đá đỏ thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Đá Đỏ để rút\n");
                    }
            break; 
        case 8:
          if($count = KhoTV::getInstance()->data->getNested("{$player->getName()}.thanhanh") >= $data[1]){
            $amount = KhoTV::getInstance()->data->getNested("{$player->getName()}.thanhanh") - $data[1];
            KhoTV::getInstance()->data->setNested("{$player->getName()}.thanhanh", $amount);;
            $player->getInventory()->addItem(ItemFactory::getInstance()->get( 155, 0, $data[1]));
            $player->sendMessage( "§l§c•§a Bạn đã rút ".$data[1]." Thạch Anh thành công, còn lại".$amount);
            KhoTV::getInstance()->data->save();
          }else{
            $player->sendMessage("§l§c•§c Bạn không đủ Thạch Anh để rút\n");
                    }
            break; 
      }
      
    });
    $form->setTitle("§l§c•§9 Rút Khoáng Sản §c•");
    $form->addLabel("§l§c•§a Chọn khoáng sản và số lượng bạn cần rút");
    $form->addSlider("§l§c•§a Số lượng", 1, 64, 1);
    $form->addDropdown("§l§c•§e Chọn khoáng sản", ["§rĐá Cuội", "§rThan", "§rSắt", "§rVàng", "§rKim Cương", "§rNgọc Lục Bảo", "§rLưu Ly", "§rĐá Đỏ", "§rThạch Anh"]);
    $form->sendToPlayer($player);
  }
  public function ShowKhoForm(Player $player)
    { 
      $form = new SimpleForm(function(Player $player, $data = null){
        $result = $data;
            if ($result === null) {
              $this->giaoDienKho($player);
                return false;
            }
        switch ($result) {
          case 0:
            $this->ShowKhoFormKS($player);
            break;;
          case 1:
            $this->ShowKhoFormNS($player);
            break;
            }
        });
        $form->setTitle("§l§c•§9 Rút Đồ trong kho §c•");
        $form->setContent("§l§c•§e Chọn khoáng sản bạn cần rút:");
        $form->addButton("§l§c•§9 Kho Khoán Sản §c•", 0, "textures/ui/khoansan");
        $form->addButton("§l§c•§9 Kho Nông Sản Sản §c•", 0, "textures/ui/nongsan");

        $form->sendToPlayer($player);
    }
    public function ShowKhoFormKS(Player $player)
    {
        $form = new SimpleForm(function (Player $player, $data = null) {
            $result = $data;
            if ($result === null) {
                $this->giaoDienKho($player);
                return false;
            }
            switch ($result) {
                case 0:
                    $this->giaoDienKho($player);
                    break;
            }
        });
        $dataKS = KhoTV::getInstance()->data;
        $name = $player->getName();
        $form->setTitle("§l§c•§9 Xem Khoáng Sản §c•");
        $form->setContent("§l§e•§c Tổng quan kho của bạn:\n\n§l§c→§e Đá cuội:§a " .$dataKS->getNested("{$name}.stone"). "\n§l§c→§e Than:§a " .$dataKS->getNested("{$name}.coal"). "\n§l§c→§e Sắt:§a " .$dataKS->getNested("{$name}.sat"). "\n§l§c→§e Vàng:§a " .$dataKS->getNested("{$name}.vang"). "\n§l§c→§e Kim cương:§a " .$dataKS->getNested("{$name}.kc") . "\n§l§c→§e Ngọc Lục Bảo:§a " .$dataKS->getNested("{$name}.nlb"). "\n§l§c→§e Lưu ly:§a " .$dataKS->getNested("{$name}.lapis"). "\n§l§c→§e Đá đỏ:§a " .$dataKS->getNested("{$name}.dado"). "\n§l§c→§e Thạch anh: §a " .$dataKS->getNested("{$name }.thanhanh"));
        $form->addButton("§l§c•§9 Thoát §c•", 0, "textures/ui/thoat");
        $form->sendToPlayer($player);
    }
    public function ShowKhoFormNS(Player $player){
      $form = new SimpleForm(function(Player $player, $data = null){
        $result = $data;
        if ($result === null) {
          $this->giaoDienKho($player);
                return false;
            }
        switch ($result) {
                case 0:
                    $this->giaoDienKho($player);
                    break;
            }
      });
      $dataNS = KhoTV::getInstance()->data;
      $name = $player->getName();
      $form->setTitle("§l§c•§9 Xem Nông Sản §c•");
      $form->setContent("§l§e•§c Tổng quan kho của bạn:\n\n§l§c→§e Gỗ:§a " .$dataNS->getNested("{$name}.wood"). "\n§l§c→§e Lúa Mì :§a " .$dataNS->getNested("{$name}.paddy"). "\n§l§c→§e Xương Rồng:§a " .$dataNS->getNested("{$name}.cactus"). "\n§l§c→§e Bí Ngô:§a " .$dataNS->getNested("{$name }.pumpkin"). "\n§l§c→§e Dưa Hấu:§a " .$dataNS->getNested("{$name}.watermelon") . "\n§l§c→§e Mía:§a " .$dataNS->getNested("{$name}.sugarcane"). "\n§l§c→§e Củ cải đỏ:§a " .$dataNS->getNested("{$name}.beetroots"). "\n§l§c→§e Cà rốt:§a " .$dataNS->getNested("{$name}.carot"). "\n§l§c→§e Khoai Tây: §a " .$dataNS->getNested("{$name }.potato"));
      $form->sendToPlayer($player);
      
    }
    public function ManagerForm(Player $player)
    {
        $form = new Customform(function (Player $player, $data = null){
         
        if ($data == null) {
            $this->giaoDienKho($player);
            return true;
        }
        switch ($data[1]) {
            case true:
                KhoTV::getInstance()->modem[$player->getName()] = true;
                $player->sendMessage("§l§c•§a Bạn đã bật tự động vào kho\n");
                break;
            case false:
                KhoTV::getInstance()->modem[$player->getName()] = false;
                $player->sendMesage("§l§c•§e Bạn đã tắt tự động vào động vào kho\n");
                break;
        }
    });
    $form->setTitle("§l§c•§9 Quản Lí Tính Năng §c•");
    $form->addLabel("§l§c•§a Tự động vào kho!");
    $form->addToggle("§l§c→§e Kéo sang phải để bật.");
    $form->sendToPlayer($player);
    return $form;
    }
    

    public function SellForm(Player $player){ 
      $form = new SimpleForm(function(Player $player, $data = null){
        $result = $data;
        if ($result === null) {
          $this->giaoDienKho($player);
            return false;
            }
        switch ($result){
          case 0:
            $name = $player->getName();
            $amounts = KhoTV::getInstance()->data->get($name);
            $sellall = KhoTV::getInstance()->getConfig();
            $money = 0;
            $price = 0;
            foreach($amounts as $type => $count){
              foreach($sellall->getNested("Sell.items") as $item => $gia){
                if ($type == $item ){
                  $money = $count * $gia;
                  KhoTV::getInstance()->data->setNested("{$name}.$type", 0);
                  KhoTV::getInstance()->data->save();
                  $price = $price + $money;    
                }
              }
            }
            if($price == "0"){
              $player->sendMessage("§a【§l§6Kho】 §c Bạn không còn gì để bán ");
            }else{
              EconomyAPI::getInstance()->addMoney($player, $price);
              $player->sendMessage("§a【§l§6Kho§a】 §rBạn đã Bán hết đồ  trong kho với giá§e ".$price);
            }
            break;
          case 2:
            break;
        }
      });
        $form->setTitle("§l§c• §9Bán Tất Cả Nông Sản §c•");
        $form->setContent("§l§c•§a Bán tất cả Đồ trong kho!");
        $form->addButton("§l§c→§e ấn để bán hết ",0,"textures/ui/sellall");
        $form->addButton("§c•§a Thoát§c •",0,"textures/ui/thoat");
        $form->sendToPlayer($player);
      
    }
    
    
    
#Bùi Quốc An (https://www.facebook.com/quocbui.an.2406)
}
  
