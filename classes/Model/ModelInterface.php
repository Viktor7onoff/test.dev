<?php
declare(strict_types=1);

namespace Model;

// интерфейс для моделей
interface ModelInterface
{
    public function getTableName(): string;
    public function verify(): bool;
    public static function create(): self;
}
