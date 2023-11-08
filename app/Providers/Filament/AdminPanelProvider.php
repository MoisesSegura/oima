<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Login;
use App\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets;
use BezhanSalleh\FilamentLanguageSwitch\FilamentLanguageSwitchPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Filament\Support\Colors\Color;
use LaraZeus\Sky\SkyPlugin;
use RyanChandler\FilamentNavigation\FilamentNavigation;
use Filament\SpatieLaravelTranslatablePlugin;

use App\Models\Banner;
use App\Models;
use Filament\Navigation\NavigationGroup;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('manager')
            ->login(Login::class)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')

            ->sidebarFullyCollapsibleOnDesktop()
            

            ->pages([
                Pages\Dashboard::class,
            ]) 
            

            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->navigationGroups([
                'Users',
                'Regions & Countries',
                'Products Base',
                'Products by country',
                'Organizations',
                'OIMA',
                'Blog',
                'Who we are',
            ])

            

            ->databaseNotifications()
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
            ])
            

            ->plugins([
              //  FilamentSpatieRolesPermissionsPlugin::make(),
                FilamentLanguageSwitchPlugin::make(),
                
            ])

          
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
