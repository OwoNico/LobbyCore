<?php

namespace Core\events;

use Core\Base;
use Core\forms\DisplayForm;
use Core\Items\LobbyItem;
use Core\tasks\CoreTask;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\item\VanillaItems;
use pocketmine\network\mcpe\protocol\ToastRequestPacket;

class EventsListener implements Listener {

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $event->setJoinMessage("");

        Base::getInstance()->getServer()->broadcastMessage("[+] {$player->getName()}");
        new LobbyItem()->sendItem($player);

        $player->getNetworkSession()->sendDataPacket(ToastRequestPacket::create("§eWelcome To", "§bThis Server"));
    }

    public function onQuit(PlayerQuitEvent $event) {
        $player = $event->getPlayer();

        $event->setQuitMessage("");

        Base::getInstance()->getServer()->broadcastMessage("[-] {$player->getName()}");
    }

    public function onLogin(PlayerLoginEvent $event) {
        $player = $event->getPlayer();

        $player->teleport(Base::getInstance()->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
        Base::getInstance()->getScheduler()->scheduleTask(new CoreTask(Base::getInstance()), 20);
    }

    public function onClick(PlayerItemUseEvent $event) {
        $player = $event->getPlayer();
        $item = $event->getItem();

        if($player->getWorld()->getFolderName() !== "lobby") return;

        switch($item->getId()) {
            case VanillaItems::COMPASS()->getId():
                DisplayForm::gameForm($player);
                break;
            case VanillaItems::CLOCK()->getId():
                DisplayForm::serverForm($player);
                break;
            case VanillaItems::BOOK()->getId():
                $player->sendMessage('Coming Soon...');
                break;
            case VanillaBlocks::REDSTONE_COMPARATOR()->asItem()->getId():
                $player->sendMessage('Coming Soon...');
                break;
        }
    }
}