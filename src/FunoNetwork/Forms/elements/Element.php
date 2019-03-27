<?php

namespace FunoNetwork\Forms\elements;

abstract class Element implements \JsonSerializable {
    /** @var string */
    private $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getAnswer($option) {
        return $option;
    }

    public final function jsonSerialize(): array {
        return ["text" => $this->text] + $this->serialize(); 
    }

    protected abstract function serialize(): array;
}