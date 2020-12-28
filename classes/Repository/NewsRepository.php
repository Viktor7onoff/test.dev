<?php
declare(strict_types=1);

namespace Repository;

use component\DB;
use Model\ModelInterface;

class NewsRepository
{
    private DB $db;
    private ModelInterface $model;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function setModel(ModelInterface $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function getAll(): ?array
    {
        $sql = 'select * from ' . $this->model->getTableName() . ' where id = ' . self::$recordId . ' limit 1';
        return $this->db->query($sql);
    }

    public function writeData(array $data): ?array
    {
        $this->db->query();
    }
}
