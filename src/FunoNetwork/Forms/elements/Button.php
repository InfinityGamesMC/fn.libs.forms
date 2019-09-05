<?php

namespace FunoNetwork\Forms\elements;

class Button extends Element {
    private $callback;
    private $image;

    public function __construct(string $text, ?callable $callback) {
        parent::__construct($text);
        $this->callback = $callback;
    }

    public function setImage(Image $image): void {
        $this->image = $image;
    }

    public function getImage(): ?Image {
        return $this->image;
    }

    public function getCallback(): ?callable {
        return $this->callback;
    }

    protected function serialize(): array {
        if($this->image !== null) {
            return [
                "image" => $this->image
            ];
        }
        return [];
    }
}