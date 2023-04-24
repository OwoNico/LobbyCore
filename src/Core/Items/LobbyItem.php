<?php

namespace Core\Items;

use pocketmine\block\VanillaBlocks;
use pocketmine\item\VanillaItems;
use pocketmine\player\GameMode;
use pocketmine\player\Player;

class LobbyItem {

    public function sendItem(Player $player) {
        $player->getInventory()->clearAll();
        $player->setHealth(20);
        $player->setMaxHealth(20);
        $player->getHungerManager()->setEnabled(false);
        $player->setGamemode(GameMode::ADVENTURE());
        $player->getInventory()->setItem(0, VanillaItems::COMPASS()->setCustomName("§r§aGame Selector"));
        $player->getInventory()->setItem(2, VanillaItems::BOOK()->setCustomName('§r§aProfile'));
        $player->getInventory()->setItem(3, VanillaItems::CLOCK()->setCustomName('§r§aServer Menu'));
        $player->getInventory()->setItem(4, VanillaBlocks::REDSTONE_COMPARATOR()->asItem()->setCustomName('§r§aSettings'));
    }
}