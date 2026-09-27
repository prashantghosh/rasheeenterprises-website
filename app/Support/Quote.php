<?php

namespace App\Support;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;

/**
 * The visitor's in-progress quote request, kept in the session as a list of product slugs.
 */
class Quote
{
    private const KEY = 'quote.items';

    public function __construct(private Session $session)
    {
    }

    /** @return list<string> */
    public function slugs(): array
    {
        return $this->session->get(self::KEY, []);
    }

    public function has(string $slug): bool
    {
        return in_array($slug, $this->slugs(), true);
    }

    public function add(string $slug): void
    {
        if (! $this->has($slug)) {
            $this->session->put(self::KEY, [...$this->slugs(), $slug]);
        }
    }

    public function remove(string $slug): void
    {
        $this->session->put(self::KEY, array_values(array_diff($this->slugs(), [$slug])));
    }

    public function clear(): void
    {
        $this->session->forget(self::KEY);
    }

    public function count(): int
    {
        return count($this->slugs());
    }

    /** Catalog entries currently in the quote, in the order they were added. */
    public function products(): Collection
    {
        $catalog = collect(config('rashee.catalog'))->keyBy('slug');

        return collect($this->slugs())
            ->filter(fn ($slug) => $catalog->has($slug))
            ->map(fn ($slug) => $catalog[$slug])
            ->values();
    }

    public static function findProduct(string $slug): ?array
    {
        return collect(config('rashee.catalog'))->firstWhere('slug', $slug);
    }
}
