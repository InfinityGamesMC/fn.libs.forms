<?php

namespace FunoNetwork\Forms\elements;

class Toggle extends Element {
    /** @var bool */
    private $default;

    public function __construct(string $id, string $text) {
        parent::__construct($id, $text);
    }

    public function hasChanged(): bool {
        return $this->default !== $this->value;
    }

    public function getDefault(): bool {
        return $this->default;
    }

    public function getAnswer($option) {
        $this->default = $option;
        return $option;
    }

    protected function serialize(): array {
        return [
            "type" => "toggle",
            "default" => $this->default
        ];
    }
}