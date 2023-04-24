<?php

namespace Core\commands;

use pocketmine\command\Command;
use Core\Base;
use Core\Items\LobbyItem;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class HubCommand extends Command {

    public function __construct(Base $plugin)
    {
        parent::__construct("hub", "Back To Lobby", "Use /hub");
        $this->plugin = $plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            new LobbyItem()->sendItem($sender);
            $sender->teleport(Base::getInstance()->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
            $sender->sendMessage("Welcome To Lobby");
        } else {
            Base::getInstance()->getLogger()->warning("Run this In Game");
        }
    }
}