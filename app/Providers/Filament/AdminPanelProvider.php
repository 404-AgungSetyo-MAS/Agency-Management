<?php

namespace App\Providers\Filament;

use App\Filament\Resources\MonetaryResource;
use App\Filament\Resources\KeukategoriResource;
use App\Filament\Resources\KeusubkategoriResource;
use App\Filament\Widgets\StatsAdminOverview;
use App\Http\Middleware\VerifyIsAdmin;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Pages\Auth\Login;
use Filament\Pages\Auth\Register;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;

use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;

use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->defaultThemeMode(ThemeMode::Light)
            ->font('Kanit')
            ->brandName('Comp-Mana')
            ->sidebarCollapsibleOnDesktop()
            ->id('admin')
            ->path('admin')
            ->colors([
                'primary' => Color::Red,
                ])
            ->userMenuItems([
                MenuItem::make()
                ->label('Keluar Mode Admin')
                ->icon('heroicon-o-cog-6-tooth')
                ->url('/main')
                ->visible(fn (): bool => auth()->user()->isAdmin())
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                VerifyIsAdmin::class,
            ])
            ->collapsibleNavigationGroups(false)
            ->topbar(true)
            ->breadcrumbs(false);
    }
}
