<?php

namespace FunoNetwork\Forms;

use pocketmine\Player;
use pocketmine\form\FormValidationException;

use FunoNetwork\Forms\elements\{
    Label, Dropdown, Toggle
};

class CustomForm extends Form {
    /** @var Element[] */
    private $elements = [];

    /** @var \Closure|null */
    private $onClose;

    public function addLabel(string $text): void {
        $this->elements[] = new Label($text);
    }

    public function addDropdown(string $text): Dropdown {
        $dropdown = new Dropdown($text);
        $this->elements[] = $dropdown;
        return $dropdown;
    }

    public function addToggle(string $text): Toggle {
        $toggle = new Toggle($text);
        //$toggle->setCallback($callable);
        $this->elements[] = $toggle;
        return $toggle;
    }

    public function onClose(callable $callable): void {
        $this->onClose = $callable;
    }

    protected function serialize(): array {
        return [
            "type" => "custom_form",
            "content" => $this->elements
        ];
    }

    public final function handleResponse(Player $player, $data): void {
        if($data == null) {
            if($this->onClose !== null) {
                ($this->onClose)();
            }
        } else if(is_array($data)) {
            $response = new FormResponse();
            foreach($data as $index => $value) {
                if(!isset($this->elements[$index])) {
                    throw new FormValidationException("Element at index $index does not exist");
                }
                $element = $this->elements[$index];

                if($element->getCallback($value) !== null) {
                    //$response->addAnswer($index, $element->getAnswer($data[$index]));
                    $element->getCallback($value)();
                }
            }
        } else {
            throw new FormValidationException("Unexpected response, got: " . gettype($data));
        }
    }
}