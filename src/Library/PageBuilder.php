<?php

namespace MrpProfile\Library;

use MrpProfile\Contracts\Row;
use MrpProfile\Contracts\Tab;
use App\Library\Tarifiner\Contracts\BaseTarifVariant;
use App\Models\User;
use MrProperter\Library\PropertyConfigStructure;
use MrProperter\Models\MPModel;

class PageBuilder
{

    public $currentRow = null;

    /** @var Row[] $rows */
    public $rows = [];
    public string $name = "Настройки приложения";
    public string $icon = "/img/prof.png";


    public static function New(MPModel $model)
    {
        $page = new PageBuilder();
        return $page;
    }

    public function AddTab($label)
    {
        if ($this->currentRow === null) {
            $this->AddRow("Общее");
        }

        $tab = new Tab();
        $tab->label = $label;
        $this->rows[$this->currentRow]->tabs[] = $tab;
        return $tab;
    }

    public function AddRow($label)
    {
        $key = md5($label);

        $row = new Row();
        $row->label = $label;

        $this->rows[] = $row;
        $this->currentRow = count($this->rows) - 1;
        return $this;
    }

}
