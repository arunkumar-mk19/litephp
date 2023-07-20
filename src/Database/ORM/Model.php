<?php

declare(strict_types=1);

namespace LitePHP\Database\ORM;

class Model
{
    protected object $connection;

    protected string $table;
    
    protected string $primaryKey = 'id';
    
    protected string $keyType = 'int';
    
    protected object|array $attributes;

    protected bool $hasTimestamps = true;

    protected bool $hasPrimaryKey = true;

    protected int $fetchMode = \PDO::FETCH_OBJ;
}