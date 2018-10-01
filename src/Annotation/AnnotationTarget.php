<?php

namespace AEngine\Orchid\Annotation\Annotations;

use AEngine\Orchid\Annotation\Annotation;

class AnnotationTarget extends Annotation
{
    public $type;

    public function __construct(string $type)
    {
        $this->set('type', strtoupper($type));
    }
}
