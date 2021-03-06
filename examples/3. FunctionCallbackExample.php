<?php

declare(strict_types=1);

namespace Ansien\AttributeFormBundle\Examples;

use Ansien\AttributeFormBundle\Attribute\AttributeForm;
use Ansien\AttributeFormBundle\Attribute\AttributeFormField;
use Ansien\AttributeFormBundle\Form\CallbackType;
use DateTimeImmutable;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;

#[AttributeForm]
class FunctionCallbackExample
{
    private array $enabledCurrencies;

    #[AttributeFormField(ChoiceType::class, [
        'choices' => [CallbackType::FUNCTION, 'getEnabledCurrenciesCb'],
        'choice_label' => [CallbackType::FUNCTION, 'getCurrencyLabelCb'],
    ])]
    #[Assert\NotBlank]
    public ?string $currency = null;

    public function __construct(array $enabledCurrencies)
    {
        $this->enabledCurrencies = $enabledCurrencies;
    }

    public function getCurrencyLabelCb(): callable
    {
        return fn ($value) => $value . ' + Function Example';
    }

    public function getEnabledCurrenciesCb(): callable
    {
        return $this->enabledCurrencies;
    }
}
