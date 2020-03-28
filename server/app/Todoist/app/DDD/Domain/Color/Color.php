<?php

namespace App\DDD\Domain\Color;

use App\DDD\Domain\CreatedAt;
use App\DDD\Domain\UpdatedAt;

class Color
{

    public static function create(ColorHex $hex, ColorName $name): Color
    {
        $color = new Color();
        $color->hex = $hex;
        $color->name = $name;
        return $color;
    }

    public static function reconstructFromStorage(ColorHex $hex, ColorId $id, ColorName $name, CreatedAt $createdAt, UpdatedAt $updatedAt): Color
    {
        $color = new Color();
        $color->hex = $hex;
        $color->id = $id;
        $color->name = $name;
        $color->createdAt = $createdAt;
        $color->updatedAt = $updatedAt;
        return $color;
    }

    /** @var ColorHex */
    private $hex;

    /** @var ColorId */
    private $id;

    /** @var ColorName */
    private $name;

    /** @var CreatedAt */
    private $createdAt;

    /** @var UpdatedAt */
    private $updatedAt;

    public function getHex(): ColorHex
    {
        return $this->hex;
    }

    public function setHex(ColorHex $hex)
    {
        $this->hex = $hex;
    }

    public function getId(): ColorId
    {
        return $this->id;
    }

    public function getName(): ColorName
    {
        return $this->name;
    }

    public function setName(ColorName $name)
    {
        $this->name = $name;
    }

    public function getCreatedAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }

    private function __construct()
    {
    }
}
