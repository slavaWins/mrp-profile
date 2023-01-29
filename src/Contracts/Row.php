<?php

namespace App\Contracts\MrpProfile;


use App\Contracts\Tarifiner\TarifVariant;
use App\Models\User;
use MrProperter\Library\PropertyConfigStructure;

class Row
{

    public $label = "Настройки";

    /** @var Tab[] $tabs  */
    public $tabs = [];


}
