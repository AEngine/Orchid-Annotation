<?php

namespace AEngine\Orchid\Annotations\Annotation;

use AEngine\Orchid\Annotations\Annotation;

class AnnotationTarget extends Annotation
{
    public $type;

    public function __construct(string $type)
    {
        $this->set('type', strtoupper($type));
    }
}
