<?php

namespace FunoNetwork\Forms;

class FormResponse {
    private $answers = [];

    public function addAnswer(int $id, $data): void {
        $this->answers[$id] = $data;
    }

    public function getToggle(int $id): bool {
        return $this->answers[$id];
    }

    public function getStepSlider(int $id): string {
        return $this->answers[$id];
    }

    public function getSlider(int $id): float {
        return $this->answers[$id];
    }

    public function getInput(int $id): string {
        return $this->answers[$id];
    }

    public function getDropdown(int $id): string {
        return $this->answers[$id];
    }
}