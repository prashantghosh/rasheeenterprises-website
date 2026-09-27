<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public const TYPE_CONTACT = 'contact';

    public const TYPE_QUOTE = 'quote';

    protected $fillable = [
        'type',
        'first_name',
        'last_name',
        'email',
        'company',
        'interest',
        'message',
        'items',
    ];

    protected function casts(): array
    {
        return [
            'items' => 'array',
        ];
    }

    public function fullName(): string
    {
        return trim($this->first_name.' '.$this->last_name);
    }
}
