<?php

namespace FunoNetwork\Forms\elements;

class Label extends Element {

    public function __construct(string $text) {
        parent::__construct($text);
    }
	
	public function getCallback() {
		return null;
	}

    protected function serialize(): array {
        return [
            "type" => "label"
        ];
    }
}