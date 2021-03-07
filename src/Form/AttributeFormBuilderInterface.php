<?php

declare(strict_types=1);

namespace Ansien\RapidFormBundle\Form;

use Symfony\Component\Form\FormInterface;

interface AttributeFormBuilderInterface
{
    public function create(object $data, array $options = [], ?string $name = null): FormInterface;
}
