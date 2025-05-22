<?php

namespace Filament\Models\Contracts;

interface HasRole
{
    public function getFilamentRole(): string;
}
