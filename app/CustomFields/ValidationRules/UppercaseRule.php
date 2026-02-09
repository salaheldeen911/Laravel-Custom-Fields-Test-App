<?php

namespace App\CustomFields\ValidationRules;

use Salah\LaravelCustomFields\ValidationRules\ValidationRule;

class UppercaseRule extends ValidationRule
{
    public function name(): string
    {
        return 'uppercase';
    }

    public function label(): string
    {
        return 'Uppercase Only';
    }

    public function baseRule(): array
    {
        return ['string'];
    }

    public function htmlTag(): string
    {
        return 'input';
    }

    public function htmlAttribute(): string
    {
        return 'text';
    }

    public function placeholder(): string
    {
        return 'Enter uppercase text';
    }

    public function description(): string
    {
        return 'Ensures the text contains only uppercase letters.';
    }

    public function apply($value): string
    {
        // Custom Laravel rule or Regex to enforce uppercase
        return 'regex:/^[A-Z0-9\s]+$/';
    }
}
