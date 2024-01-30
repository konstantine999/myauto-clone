<?php
namespace App\Filament\Layouts;

use Filament\Layouts\Layout;

class CustomLayout extends Layout
{
    public static $title = 'Custom Layout';

    public function view(): string
    {
        return 'filament.layouts.custom'; // Blade view file for your custom layout
    }
}
