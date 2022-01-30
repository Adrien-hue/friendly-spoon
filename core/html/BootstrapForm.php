<?php

namespace Core\Html;

class BootstrapForm extends Form
{
    /**
     * Create new instance
     *
     * @param array|object $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /**
     * Surround HTML with a tag
     *
     * @param string $html
     * @return string
     */
    protected function surround(string $html):string
    {
        return "<{$this->surround} class=\"input-group flex-nowrap mb-3\">$html</{$this->surround}>";
    }

    public function label(string $name, string $label)
    {
        return "<label for=\"$name\" class=\"form-label\">$label :</label>";
    }

    public function addons(array $contents = []):string
    {
        $addons = "";

        foreach($contents as $content){
            $addons .= "<span class=\"input-group-text\">$content</span>";
        }

        return $addons;
    }

    /**
     * Generate label and its input
     *
     * @param string $name
     * @param string $label
     * @param array $params
     * @return string
     */
    public function input(string $name, string $label, array $params = []):string
    {
        if($label != ""){
            $label = $this->label($name, $label);
        }

        $type = (isset($params['type']) && $params['type'] !== "") ? $params['type'] : 'text';

        $placeholder = (isset($params['placeholder']) && $params['placeholder'] !== "") ? "placeholder=\"" . $params['placeholder'] . "\"" : "";

        $before_addons = (isset($params['b-addons'])) ? $this->addons($params['b-addons']) : "";

        if($type === 'textarea'){
            $input = "<textarea name=\"$name\" id=\"$name\" $placeholder cols=\"30\" rows=\"10\">{$this->getValue($name)}</textarea>";
        } else {
            $input = "<input type=\"$type\" id=\"$name\" name=\"$name\" value=\"{$this->getValue($name)}\" $placeholder class=\"form-control\">";
        }

        return $label . $this->surround($before_addons . $input);
    }

    /**
     * Generate label and its select
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return string
     */
    public function select(string $name, string $label, array $options = []):string
    {
        if($label != ""){
            $label = "<label for=\"$name\" class=\"form-label\">$label :</label>";
        }

        $select = "<select name=\"$name\" id=\"$name\">";

        foreach($options as $opt => $value){
            $attributes = "";

            if($opt == $this->getValue($name)){
                $attributes = "selected";
            }

            $select .= "<option value=\"$opt\" $attributes>$value</option>";
        }
        
        $select .= "</select>";

        return $this->surround($label . $select);
    }
}