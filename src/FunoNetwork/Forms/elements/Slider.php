<?php

namespace FunoNetwork\Forms\elements;

use InvalidArgumentException;
use function count;

class Slider extends Element {
    /** @var float */
    private $min;
    /** @var float */
    private $max;
    /** @var float */
    private $step = 1.0;
    /** @var float */
    private $default;

    /** @var callable|null */
    private $callback;

    public function __construct(string $text, float $min, float $max, float $step, ?float $default, ?callable $callback){
        parent::__construct($text);

        $this->min = $min;
        $this->max = $max;
        $this->step = $step;

        if ($default !== null) {
            $this->default = $default;
        } else {
            $this->default = $this->min;
        }
    }

    public function getMin() : float{
        return $this->min;
    }

    public function getMax() : float{
        return $this->max;
    }

    public function getStep() : float{
        return $this->step;
    }

    public function getDefault() : float{
        return $this->default;
    }

    public function getCallback(): ?callable {
        return $this->callback;
    }

    protected function serialize(): array {
        return [
            "type" => "slider",
            "min" => $this->min,
            "max" => $this->max,
            "default" => $this->default,
            "step" => $this->step
        ];
    }
}