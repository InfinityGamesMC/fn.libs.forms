<?php

namespace FunoNetwork\Forms\elements;

abstract class Element implements \JsonSerializable {
    /** @var string */
    private $id;

    /** @var string */
    private $text;

    public function __construct(string $id, string $text) {
        $this->id = $id;
        $this->text = $text;
    }

    public function getId(): string {
        return $this->id;
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