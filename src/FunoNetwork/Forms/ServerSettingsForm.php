<?php

namespace FunoNetwork\Forms;

use FunoNetwork\Forms\elements\Image;

class ServerSettingsForm extends CustomForm {
    private $icon;

    public function setIcon(Image $image): void {
        $this->icon = $image;
    }

    public function getIcon(): ?Image {
        return $this->icon;
    }

    public function hasIcon(): bool {
        return $this->icon !== null;
    }

    protected function serialize(): array {
        $data = parent::serialize();
        if($this->hasIcon()) {
            $data["icon"] = $this->icon;   
        }
        return $data;
    }
}