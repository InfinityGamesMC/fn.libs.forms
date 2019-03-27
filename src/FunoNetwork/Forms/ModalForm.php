<?php

namespace FunoNetwork\Forms;

use pocketmine\Player;
use pocketmine\form\FormValidationException;

class ModalForm extends Form {
    /** @var string */
    private $text;
    private $yesButton;
    private $noButton;

    /** @var \Closure|null */
    private $onSubmit;

    public function __construct(string $title, string $text) {
        parent::__construct($title);
        $this->text = $text;
    }

    public function setYesButtonText(string $text): void {
        $this->yesButton = $text;
    }

    public function setNoButtonText(string $text): void {
        $this->noButton = $text;
    }

    public function getText(): string {
        return $this->text;
    }

    public function onResponse(callable $callable): void {
        $this->onSubmit = $callable;
    }

    protected function serialize(): array {
        return [
            "type" => "modal",
            "content" => $this->text,
            "button1" => $this->yesButton,
            "button2" => $this->noButton
        ];
    }

    public final function handleResponse(Player $player, $data): void {
        if(!is_bool($data)) {
            throw new FormValidationException("Expected bool, got: " . gettype($data));
        }
        ($this->onSubmit)($data);
    }
}