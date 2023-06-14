<?php

declare(strict_types=1);

namespace Core\Database\ORM;

class Builder
{
    protected array $conditions = [];

    protected array $availableOperators = ['=', '<'];

    public function where(string $field, $value, string $operand = '='): self
    {
        $string = (count($this->conditions) > 0) ? "AND" : "WHERE";

        $this->conditions[] = "{$string} {$field} {$operand} {$value} ";

        return $this;
    }
}