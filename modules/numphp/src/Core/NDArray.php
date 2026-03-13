<?php

namespace NumPHP\Core;

class NDArray
{
    private $data;
    private $shape;
    private $dtype;
    private $size;

    public function __construct($data, $dtype = null)
    {
        $this->data = $data;
        $this->shape = $this->calculateShape($data);
        $this->size = $this->calculateSize($this->shape);
        $this->dtype = $dtype ?? $this->detectDType($data);
    }

    private function calculateShape($data)
    {
        if (!is_array($data)) {
            return [];
        }

        $shape = [];
        $level = $data;
        while (is_array($level)) {
            $shape[] = count($level);
            $level = $level[0] ?? null;
        }
        return $shape;
    }

    private function calculateSize($shape)
    {
        if (empty($shape)) {
            return 1;
        }
        return array_product($shape);
    }

    private function detectDType($data)
    {
        if (is_int($data)) {
            return 'int';
        }
        if (is_float($data)) {
            return 'float';
        }
        if (is_bool($data)) {
            return 'bool';
        }
        if (is_array($data)) {
            $firstValue = $this->getFirstValue($data);
            return $this->detectDType($firstValue);
        }
        return 'mixed';
    }

    private function getFirstValue($data)
    {
        if (!is_array($data)) {
            return $data;
        }
        if (empty($data)) {
            return null;
        }
        $firstValue = $data[0];
        while (is_array($firstValue)) {
            if (empty($firstValue)) {
                return null;
            }
            $firstValue = $firstValue[0];
        }
        return $firstValue;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getShape()
    {
        return $this->shape;
    }

    public function getDType()
    {
        return $this->dtype;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function __toString()
    {
        return '[' . implode(', ', $this->shape) . ']';
    }
}