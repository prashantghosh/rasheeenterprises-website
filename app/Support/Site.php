<?php

namespace App\Support;

class Site
{
    /**
     * WhatsApp chat link with an optional prefilled message. Falls back to the
     * contact page until a WhatsApp business number is configured.
     */
    public static function whatsapp(string $text = ''): string
    {
        $number = preg_replace('/\D/', '', (string) config('rashee.contact.whatsapp'));

        if ($number === '') {
            return route('contact');
        }

        return 'https://wa.me/'.$number.($text !== '' ? '?text='.rawurlencode($text) : '');
    }

    public static function tel(): string
    {
        return 'tel:'.preg_replace('/[^\d+]/', '', config('rashee.contact.phone'));
    }
}
