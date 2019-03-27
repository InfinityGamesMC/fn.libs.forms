<?php

namespace FunoNetwork\Forms\elements;

class Label extends Element {

    public function __construct(string $text) {
        parent::__construct($text);
    }

    protected function serialize(): array {
        return [
            "type" => "label"
        ];
    }
}