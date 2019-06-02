<?php

namespace FunoNetwork\Forms;

use pocketmine\form\Form as IForm;

abstract class Form implements IForm {
    /** @var string */
    private $title;
    private $icon;

    public function __construct(string $title) {
        $this->title = $title;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public final function jsonSerialize(): array {
        return ["title" => $this->title] + $this->serialize();
    }

    protected abstract function serialize(): array;
}