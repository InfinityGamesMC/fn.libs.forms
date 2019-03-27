<?php

namespace FunoNetwork\Forms;

use pocketmine\Player;
use pocketmine\form\FormValidationException;

use FunoNetwork\Forms\elements\Button;

class SimpleForm extends Form {
    /** @var Button[] */
    private $buttons = [];

    /** @var string */
    private $text = "";

    /** @var \Closure|null */
    private $onClose;

    public function __construct(string $title) {
        parent::__construct($title);
    }

    public function addButton(string $text, ?callable $callable): void {
        $this->buttons[] = new Button($text, $callable);
    }

    public function setText(string $text): void {
        $this->text = $text;
    }

    public function onClose(callable $callable): void {
        $this->onClose = $callable;
    }

    protected function serialize(): array {
        return [
            "type" => "form",
            "buttons" => $this->buttons,
            "content" => $this->text
        ];
    }

    public final function handleResponse(Player $player, $data): void {var_dump("response");var_dump($data);
        if($data === null) {
            if($this->onClose !== null) {
                ($this->onClose)();
            }
        } else if(is_int($data)) {
            if(!isset($this->buttons[$data])) {
                 throw new FormValidationException("Button with index $data does not exist");
            }

            $button = $this->buttons[$data];

            if($button->getCallback() !== null) {
                $button->getCallback()();
            }
        } else {
            throw new FormValidationException("Unexpected response, got: " . gettype($data));
        }
    }
}