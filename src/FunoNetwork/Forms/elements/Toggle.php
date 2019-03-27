<?php

namespace FunoNetwork\Forms\elements;

class Toggle extends Element {
    /** @var bool */
    private $default;

    /** @var callable|null */
    private $callback;

    public function __construct(string $text, bool $default, ?callable $callback) {
        parent::__construct($text);
        $this->default = $default;
        $this->callback = $callback;
    }

    public function hasChanged(): bool {
        return $this->default !== $this->value;
    }

    public function getCallback(): ?callable {
        return $this->callback;
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