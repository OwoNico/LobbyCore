<?php

namespace Core;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use Core\commands\HubCommand;
use Core\events\EventsListener;

class Base extends PluginBase {

    public static $instance;

    public function onEnable(): void {
        $this->getLogger()->info('Enabled LobbyCore v1.0.0');

        $this->getLogger()->info('Made by OwoNico');

        $this->getServer()->getPluginManager()->registerEvents(new EventsListener(), $this);
        $this->getServer()->getCommandMap()->register("hub", new HubCommand($this));

        self::$instance = $this;
    }

    public function onDisable(): void {
        $this->getLogger()->info('Disabled');
    }

    public static function getInstance(): Base {
        return self::$instance;
    }
}