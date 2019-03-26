<?php

namespace FunoNetwork\Forms;

class FormResponse {
    private $answers = [];

    public function addAnswer(string $id, $data): void {
        $this->answers[$id] = $data;
    }

    public function getToggle(string $id): bool {
        return $this->answers[$id];
    }

    public function getStepSlider(string $id): string {
        return $this->answers[$id];
    }

    public function getSlider(string $id): float {
        return $this->answers[$id];
    }

    public function getInput(string $id): string {
        return $this->answers[$id];
    }

    public function getDropdown(string $id): string {
        return $this->answers[$id];
    }
}