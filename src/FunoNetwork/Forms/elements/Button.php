<?php

namespace FunoNetwork\Forms\elements;

class Button extends Element {

    public function __construct(string $id, string $text) {
        parent::__construct($id, $text);
    }

    protected function serialize(): array {
        return [];
    }
}