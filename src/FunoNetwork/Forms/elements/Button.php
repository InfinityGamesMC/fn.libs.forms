<?php

namespace FunoNetwork\Forms\elements;

class Button extends Element {
    private $callback;

    public function __construct(string $text, ?callable $callback) {
        parent::__construct($text);
        $this->callback = $callback;
    }

    public function getCallback(): ?callable {
        return $this->callback;
    }

    protected function serialize(): array {
        return [];
    }
}