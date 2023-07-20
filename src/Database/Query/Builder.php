<?php

declare(strict_types=1);

namespace LitePHP\Database\Query;

use InvalidArgumentException;
use LitePHP\Support\Str;

class Builder
{
    protected array $conditions = [];
    
    protected array $bindParams = [];

    protected array $bindValues = [];

    protected array $comparisonOperators = ['=', '<', '>', '<=', '>=', '<>', 'LIKE'];

    public function where(string $column, mixed $value, string $operand = '='): self
    {
        if(!in_array($operand, $this->comparisonOperators)){
            throw new InvalidArgumentException("Error: Invalid comparison operator!");
        }

        $bindParam = $this->getBindParam($column);

        $this->bindParams[] = $bindParam;

        $this->conditions[] = ['logicalOperator' => 'AND', 'column' => $column, 'operand' => $operand, 'bindParam' => $bindParam];

        $this->bindValues[] = [$bindParam => $value];

        return $this;
    }

    public function getBindParam(string $column): string
    {
        $paramName = "";
        
        do {
            $paramName = ":" . $column . Str::random(6);
        } while (!in_array($paramName, $this->bindParams));

        return $paramName;
    }

    public function whereIn(string $column, array $values): self
    {
        $string = (count($this->conditions) > 0) ? "AND" : "WHERE";

        $this->conditions[] = "{$string} {$column} IN ('". implode("', '", $values) ."') ";

        $this->bindValues[] = $values;

        return $this;
    }

    public function orWhere(string $column, mixed $value, string $operand = '='): self
    {
        if(!in_array($operand, $this->comparisonOperators)){
            throw new InvalidArgumentException("Error: Invalid comparison operator!");
        }
        
        if(count($this->conditions) === 0){
            throw new InvalidArgumentException("Error: Can't have an orWhere condition before where condition!");
        }
        
        $conditionCount = count($this->conditions) + 1;

        $bindParam = ":" . $column . $conditionCount;

        $this->conditions[] = ['logicalOperator' => "OR", 'column' => $column, 'operand' => $operand, 'bindParam' => $bindParam];

        $this->bindValues[] = [$bindParam => $value];

        return $this;
    }

    public function getSql(): void
    {
        # code...
    }

    public function bindParameters(): void
    {
        # code...
    }

    public function get(array $columns = ['*']): void
    {
        # code...
    }

    public function select(array $columns = ['*']): void
    {
        # code...
    }

    public function raw(string $query): void
    {
        # code...
    }

    public function count(): void
    {
        # code...
    }
}