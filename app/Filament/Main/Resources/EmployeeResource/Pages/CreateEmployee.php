<?php

namespace App\Filament\Main\Resources\EmployeeResource\Pages;

use App\Filament\Main\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;
}
