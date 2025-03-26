<?php
interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare
{
    const PI = 3.14;
    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        return self::PI * ($this->r**2);
    }
}
class Rectangle implements CalculateSquare
{
    private $a;
    private $b;
    public function __construct(float $a, float $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function calculateSquare(): float
    {
        return $this->a * $this->b;
    }
}

class Square implements CalculateSquare
{
    private $x;
    public function __construct(float $x)
    {
        $this->x = $x;
    }
    public function calculateSquare(): float
    {
        return $this->x**2;
    }
}
$obj = [
    new Square(5),
    new Rectangle(3, 4),
    new Circle(3)
];
foreach ($obj as $object) {
    if ($object instanceof CalculateSquare) {
        echo 'Объект реализует интерфейс CalculateSquare. Площадь: ' . $object->calculateSquare();
        echo '<br>';
        echo 'Это объект класса: ' . get_class($object);
    } else {
        echo 'Этот объект класса ' . get_class($object) . 'не реализует интерфейс CalculateSquare';
    }
    echo '<BR>';
}