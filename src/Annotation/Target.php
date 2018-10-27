<?php

namespace AEngine\Annotations\Annotation;

use AEngine\Annotations\Annotation;

class Target extends Annotation
{
    public $type;

    public function __construct(string $type)
    {
        $this->set('type', strtoupper($type));
    }
}
