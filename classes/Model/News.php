<?php
declare(strict_types=1);

namespace Model;

class News implements ModelInterface
{
    private string $table = 'news';
    private string $title;
    private string $body;
    private string $description;
    private string $createAt;
    private string $author;

    public function getTableName(): string
    {
        return $this->table;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function verify(): bool
    {

    }

    public static function create(): self
    {
        return new self();
    }
}
