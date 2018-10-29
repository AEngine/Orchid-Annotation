Annotation
====
Docblock Annotations parser functional

#### Requirements
* PHP >= 7.0

#### Installation
Run the following command in the root directory of your web project:
  
> `composer require aengine/annotation`

#### Usage

Custom Enum annotation
```php
/**
 * @AEngine\Annotations\Annotation\Target('PROPERTY')
 */
class Enum extends \AEngine\Annotations\Annotation
{
    protected $literal;

    public $message;

    public function __construct($literal)
    {
        $this->literal = $literal;
    }

    public function getMessage() {
        return $this->message;
    }

    public function validate($value)
    {
        return in_array(strtolower($value), $this->literal);
    }
}
```

Example check function
```php
function check($obj)
{
    $arc = new \AEngine\Annotations\AnnotatedReflectionClass($obj);

    foreach ($arc->getProperties() as $property) {
        $annotation = $property->getAnnotation(Enum::class);

        if ($annotation) {
            if (!$annotation->validate($property->getValue($obj))) {
                throw new RuntimeException(sprintf($annotation->getMessage(), $property->getName()));
            }
        }
    }

    return true;
}
```

Entity example
```php
class Car
{
    /**
     * @Enum({'bmw', 'opel', 'lada'}, message="Value in "%s" is not available")
     *
     * @var string
     */
    public $brand;

    /**
     * @var string
     */
    public $model;
}
```

Create object and check
```php
$car = new Car();
$car->brand = 'BMW';
$car->model = 'X5';

if (check($car) === true) {
    // other code
}
```

#### Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

#### License
The package annotation is licensed under the MIT license. See [License File](LICENSE.md) for more information.
