<?php

declare(strict_types=1);

namespace Core;

use RuntimeException;
use InvalidArgumentException;

class DotEnv
{
    /**
     * The full path of the .env file
     *
     * @var string
     */
    protected string $path;

    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException(sprintf("Env file '%s' does not exist!", $path));
        }

        $this->path = $path;
    }

    public function load(): void
    {
        if (!is_readable($this->path)) {
            throw new RuntimeException(sprintf("The given file '%s' is not readable", $this->path));
        }

        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (is_array($lines) && count($lines) > 0) {
            foreach ($lines as $line) {

                if (strpos(trim($line), '#') === 0) {
                    continue;
                }

                [$name, $value] = explode('=', $line, 2);

                $name = trim($name);
                $value = trim($value);

                if (!in_array($name, $_SERVER) && !in_array($name, $_ENV)) {
                    putenv(sprintf("%s=%s", $name, $value));
                    $_ENV[$name] = $value;
                }
            }
        }
    }
}
