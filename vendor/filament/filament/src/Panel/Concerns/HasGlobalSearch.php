<?php

namespace Filament\Panel\Concerns;

use Closure;
use Exception;
use Filament\GlobalSearch\Contracts\GlobalSearchProvider;
use Filament\GlobalSearch\DefaultGlobalSearchProvider;

trait HasGlobalSearch
{
    protected string | Closure | null $globalSearchDebounce = null;

    /**
     * @var array<string>
     */
    protected array $globalSearchKeyBindings = [];

    protected string | bool $globalSearchProvider = true;

    public function globalSearch(string | bool $provider = true): static
    {
        if (is_string($provider) && (! in_array(GlobalSearchProvider::class, class_implements($provider)))) {
            throw new Exception("Global search provider {$provider} does not implement the " . GlobalSearchProvider::class . ' interface.');
        }

        $this->globalSearchProvider = $provider;

        return $this;
    }

    public function globalSearchDebounce(string | Closure | null $debounce): static
    {
        $this->globalSearchDebounce = $debounce;

        return $this;
    }

    /**
     * @param  array<string>  $keyBindings
     */
    public function globalSearchKeyBindings(array $keyBindings): static
    {
        $this->globalSearchKeyBindings = $keyBindings;

        return $this;
    }

    public function getGlobalSearchDebounce(): string
    {
        return $this->evaluate($this->globalSearchDebounce) ?? '500ms';
    }

    /**
     * @return array<string>
     */
    public function getGlobalSearchKeyBindings(): array
    {
        return $this->globalSearchKeyBindings;
    }

    public function getGlobalSearchProvider(): ?GlobalSearchProvider
    {
        $provider = $this->globalSearchProvider;

        if ($provider === false) {
            return null;
        }

        if ($provider === true) {
            $provider = DefaultGlobalSearchProvider::class;
        }

        return app($provider);
    }
}
