<?php

namespace FunoNetwork\Forms\elements;

class Image implements \JsonSerializable {
    public const TYPE_URL = "url";
    public const TYPE_PATH = "path";
    
    /** @var string */
    private $type;
    private $data;

    public function __construct(string $data, string $type = self::TYPE_URL) {
        $this->data = $data;
        $this->type = $type;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getData(): string {
        return $this->data;
    }

    public function jsonSerialize(): array {
        return [
            "type" => $this->type,
            "data" => $this->data
        ];
    }
}