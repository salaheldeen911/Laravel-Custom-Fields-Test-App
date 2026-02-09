<?php

namespace App\CustomFields\FieldTypes;

use Salah\LaravelCustomFields\FieldTypes\FieldType;

use Salah\LaravelCustomFields\Contracts\HasOptions;

class RatingField extends FieldType implements HasOptions
{
    public function name(): string
    {
        return 'rating';
    }

    public function label(): string
    {
        return 'Star Rating';
    }

    public function baseRule(): array
    {
        return ['string'];
    }

    public function allowedRules(): array
    {
        // Allowed validation rules for this type
        return [];
    }

    public function htmlTag(): string
    {
        return 'select';
    }

    public function htmlAttribute(): string
    {
        return '';
    }

    public function options(): array
    {
        return [
            '1' => '1 Star',
            '2' => '2 Stars',
            '3' => '3 Stars',
            '4' => '4 Stars',
            '5' => '5 Stars',
        ];
    }

    public function hasOptions(): bool
    {
        return true;
    }

    public function view(): string
    {
        // We will stick to standard select view for now, usually 'custom-fields::fields.select'
        // But since this is a new type, we might need to tell it to use the select template
        // OR create a specific rating view. For simplicity in this demo, let's reuse select.
        return 'custom-fields::fields.select';
    }

    public function description(): string
    {
        return 'A star rating field from 1 to 5.';
    }
}
