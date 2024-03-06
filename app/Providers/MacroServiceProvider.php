<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
use PowerComponents\LivewirePowerGrid\Button;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Extending powergrid button to add icon functionality
        Button::macro('icon', function (string $icon, array $attributes = []) {
            $this->dynamicProperties['icon'] = [
                'component' => 'a',
            ];

            $attributes = new ComponentAttributeBag($attributes);
            $this->slot = $attributes->toHtml() ? "<i $attributes></i>".$this->slot : $this->slot;

            return $this;
        });
    }
}
