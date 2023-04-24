<?php

namespace Core\tasks;

use Core\Base;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\TaskScheduler;

class CoreTask extends Task {
    
    public function __construct(Base $plugin) 
    {
        $this->plugin = $plugin;
    }

    public function onRun(): void {
        foreach(Base::getInstance()->getServer()->getOnlinePlayers() as $player) {
            $player->setScoreTag("§ePing§7 | §b{$player->getNetworkSession()->getPing()}");
        }
    }
}