<?php


namespace MrpProfile\Contracts;

class Tab
{


    public $route = null;
    public $title = null;
    public $icon = null;
    public $label = "Вкладка";
    public $tabCustomLabel = null;
    public $view = null;
    public $formTag = null;
    public $buttonText = null;
    public $ajax = false;
    public $descriptionBefore = null;
    public $shortDescription = null;
    public $descriptionTab = null;
    public $descriptionAfter = null;
    public $headerBackground = null;

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


    public function SetButtonText($txt)
    {
        $this->buttonText = $txt;
        return $this;
    }

    public function SetCustomTabLabel($text)
    {
        $this->tabCustomLabel = $text;
        return $this;
    }
    public function SetTabDescription($text)
    {
        $this->descriptionTab = $text;
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

    public function SetShortDescription($text)
    {
        $this->shortDescription = $text;
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

    public function SetIcon($url)
    {
        $this->icon = $url;
        return $this;
    }

    public function SetHeaderBackground($url)
    {
        $this->headerBackground = $url;
        return $this;
    }

    /**
     * Вернуть короткое описание, или сгенерировать из бефор и афтер текста
     * @return mixed|string|null
     */
    public function GetShortDescriptionOrBefore()
    {
        if($this->descriptionTab!==null)return $this->descriptionTab;
        if($this->shortDescription)return $this->shortDescription;
        return self::ExtractSentences((  $this->descriptionAfter ?? "") ." ".( $this->descriptionBefore ?? ""), 100);
    }


    public static function ExtractSentences($text, $maxLength) {

        $text = str_replace(".  ", ". ", $text);

        // Разбиваем текст на предложения
        $sentences = explode(". ", $text);

        $output = "";
        $currentLength = 0;

        foreach ($sentences as $sentence) {
            // Длина текущего предложения
            $sentenceLength = strlen($sentence) + 2; // +2 для точки и пробела

            if ($currentLength === 0 && $sentenceLength > $maxLength) {
                // Если первое предложение само по себе длинное, используем его
                $output = $sentence;
                break;
            }

            if ($currentLength + $sentenceLength <= $maxLength) {
                $output .= ($output === "" ? "" : ". ") . $sentence;
                $currentLength += $sentenceLength;
            } else {
                break;
            }
        }

        // Удаляем возможную лишнюю точку в конце
        if (substr($output, -1) === '.') {
            $output = rtrim($output, '. ');
        }

        return $output;
    }

}
