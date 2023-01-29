<?php


namespace MrpProfile\Contracts;

use App\Models\User;
use MrProperter\Library\PropertyConfigStructure;

class Tab
{


    public $route = null;
    public $title = null;
    public $label = "Вкладка";
    public $view = null;
    public $formTag = null;
    public $ajax = false;

    public function SetAjax($val)
    {
        $this->ajax = $val;
        return $this;
    }


    public function SetRoute($route)
    {

        $this->route = $route;
        return $this;
    }

    public function SetTag($tag)
    {
        $this->formTag = $tag;
        return $this;
    }


    public function SetLabel($label)
    {
        $this->label = $label;
        return $this;
    }


    public function SetTitle($text)
    {
        $this->title = $text;
        return $this;
    }

}
