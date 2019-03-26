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
    private $onSubmit;
    private $onClose;

    public function addLabel(string $text): void {
        $this->elements[] = new Label($text);
    }

    public function addDropdown(string $text, string $id): Dropdown {
        $dropdown = new Dropdown($id, $text);
        $this->elements[] = $dropdown;
        return $dropdown;
    }

    public function addToggle(string $text, string $id): Toggle {
        $toggle = new Toggle($id, $text);
        $this->elements[] = $toggle;
        return $toggle;
    }

    public function onResponse(callable $callable): void {
        $this->onSubmit = $callable;
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
        } else if (is_array($data)) {
            $response = new FormResponse();

            foreach($data as $index => $value) {
                if(!isset($this->elements[$index])) {
                    throw new FormValidationException("Element at index $index does not exist");
                }
                
                if($this->onSubmit !== null) {
                    $element = $this->elements[$index];
                    $response->addAnswer($element->getId(), $element->getAnswer($data[$index]));

                    ($this->onSubmit)($response);
                }

                var_dump($element->getAnswer($data[$index]));
            }
        } else {
            throw new FormValidationException("Unexpected response, got: " . gettype($data));
        }
    }
}