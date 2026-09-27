<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public const TYPE_SPEC = 'spec';

    public const TYPE_CONTACT = 'contact';

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'company',
        'quantity',
        'box_weight',
        'product',
        'spec',
        'message',
        'source',
    ];

    public function reference(): string
    {
        return 'RQ-'.str_pad((string) $this->id, 4, '0', STR_PAD_LEFT);
    }
}
