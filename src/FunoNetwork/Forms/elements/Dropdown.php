<?php

namespace FunoNetwork\Forms\elements;

class Dropdown extends Element {
    /** @var string[] */
    private $options = [];

    /** @var int */
    private $defaultOption = 0;

    public function __construct(string $id, string $text) {
        parent::__construct($id, $text);
    }

    public function addOption(string $id, string $text, $default = false): void {
        if($default) {
            $this->defaultOption = count($this->options);
        }
        $this->options[] = $text;
    }

    public function getOptions(): array {
        return $this->options;
    }

    public function getDefaultOptionIndex(): int {
        return $this->defaultOption;
    }

    public function getAnswer($option) {
        $this->defaultOption = $option;
        return $this->options[$option];
    }

    protected function serialize(): array {
        return [
            "type" => "dropdown",
            "options" => $this->options,
            "default" => $this->defaultOption
        ];
    }
}