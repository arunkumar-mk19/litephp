<?php

namespace LitePHP;

abstract class Model
{
    protected $amount = 2;

    public static function __callStatic($name, $arguments)
    {
        // if(method_exists(static::class, $name)){
            $called = get_called_class();
            $class = new $called();
            return $class->$name(...$arguments);
            // call_user_func_array([static::class, $name], $arguments);
        // }
    }
    
    protected function find($id)
    {
        $this->amount = $this->amount * $id;

        return $this;
    }

    public function get()
    {
        return $this->amount;
    }
}