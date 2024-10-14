<?php

namespace MrpProfile\Contracts;

use App\Models\User;
use MrProperter\Library\PropertyConfigStructure;

class Row
{

    public $label = "Настройки";
    public ?string $description = null;
    public ?string $icon = null;

    /** @var Tab[] $tabs  */
    public $tabs = [];


}
