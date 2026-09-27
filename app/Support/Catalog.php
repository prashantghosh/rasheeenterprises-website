<?php

namespace App\Support;

use Illuminate\Support\Collection;

/**
 * Read access to the product catalog in config/rashee.php, with the derived
 * values the views need (card price line, display name).
 */
class Catalog
{
    public static function all(): Collection
    {
        return collect(config('rashee.catalog'))->map(fn (array $p) => static::prepare($p));
    }

    public static function find(string $slug): ?array
    {
        return static::all()->firstWhere('slug', $slug);
    }

    /** @param list<string> $slugs */
    public static function many(array $slugs): Collection
    {
        $all = static::all()->keyBy('slug');

        return collect($slugs)->filter(fn ($s) => $all->has($s))->map(fn ($s) => $all[$s])->values();
    }

    public static function priceLine(?int $from, string $unit = 'box'): string
    {
        return $from ? 'From ₹'.number_format($from).' per '.$unit : 'Priced to spec';
    }

    private static function prepare(array $p): array
    {
        [$skuName, $skuCode] = match (true) {
            $p['custom'] ?? false => ['Printed BOPP', 'PRT'],
            $p['strap'] ?? false => ['PP strap', 'STR'],
            str_contains($p['name'], 'Masking') => ['Masking', 'MSK'],
            str_contains($p['name'], 'Filament') => ['Filament', 'FIL'],
            default => ['BOPP', 'BOP'],
        };

        return $p + [
            'sku_name' => $skuName,
            'sku_code' => $skuCode,
            'card_name' => $p['name'],
            'custom' => false,
            'strap' => false,
            'price' => static::priceLine($p['price_from'] ?? null, $p['unit'] ?? 'box'),
            'price_note' => 'D2C pricing. For bulk and custom orders, please enquire.',
        ];
    }
}
