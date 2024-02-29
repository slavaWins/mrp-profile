<?php


namespace MrpProfile\Contracts;

class Tab
{


    public $route = null;
    public $title = null;
    public $label = "Вкладка";
    public $view = null;
    public $formTag = null;
    public $ajax = false;
    public $descriptionBefore = null;
    public $descriptionAfter = null;

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


    public function SetAfterDescription($text)
    {
        $this->descriptionAfter = $text;
        return $this;
    }

    public function SetBeforeDescription($text)
    {
        $this->descriptionBefore = $text;
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
