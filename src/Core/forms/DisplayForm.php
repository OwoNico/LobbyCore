<?php

namespace Core\forms;

use jojoe77777\FormAPI\SimpleForm;
use pocketmine\player\Player;

class DisplayForm {

    public static function gameForm(Player $player) {
        $form = new SimpleForm(function(Player $player, int $data = null) {
            if($data === null) {
                return true;
            }

            switch($data) {
                case 0:
                    $player->sendMessage('Game 1');
                    break;
                case 1:
                    $player->sendMessage('Game 2');
                    break;
            }
        });
        $form->setTitle('§cGame Selector');
        $form->addButton("Game 1");
        $form->addButton("Game 2");
        return $form;
    }

    public static function serverForm(Player $player) {
        $form = new SimpleForm(function(Player $player, int $data = null) {
            if($data === null) {
                return true;
            }

            switch($data) {
                case 0:
                    $player->transfer("zunicmc.ml", 19140);
                    break;
            }
        });
        $form->setTitle('§cServer Menu');
        $form->addButton("Practice");
        return $form;
    }
}