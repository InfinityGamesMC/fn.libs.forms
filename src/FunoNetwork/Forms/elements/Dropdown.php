<?php

namespace FunoNetwork\Forms\elements;

class Dropdown extends Element {
    /** @var string[] */
    private $options = [];

    /** @var int */
    private $defaultOption = 0;

    /** @var callable[] */
    private $callbacks = [];

    public function __construct(string $text) {
        parent::__construct($text);
    }

    public function addOption(string $text, $default = false, ?callable $callable): void {
        if($default) {
            $this->defaultOption = count($this->options);
        }
        if($callable !== null) {
            $this->callbacks[] = $callable;
        }
        $this->options[] = $text;
    }

    public function getCallback(int $index): ?callable {
        return $this->callbacks[$index];
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