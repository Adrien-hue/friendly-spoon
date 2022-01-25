<?php

namespace Core\Html;

/**
 * Class Form
 * 
 * Generate form
 */
class Form
{
    /**
     * Data use by the form
     *
     * @var array|object
     */
    private $data = [];

    /**
     * Tag used to surrond HTML
     *
     * @var string
     */
    private string $surround = "div";

    /**
     * Create new instance
     *
     * @param array|object $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Surround HTML with a tag
     *
     * @param string $html
     * @return string
     */
    private function surround(string $html):string
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    /**
     * Return the value at specific index
     *
     * @param string $key
     * @return void
     */
    private function getValue(string $key)
    {
        if(is_object($this->data)){
            $method = 'get' . ucfirst($key);
            return $this->data->$method();
        }
        return (isset($this->data[$key])) ? $this->data[$key] : null;
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
        $label = "<label for=\"$name\">$label :</label>";

        $type = (isset($params['type']) && $params['type'] !== "") ? $params['type'] : 'text';

        if($type === 'textarea'){
            $input = "<textarea name=\"$name\" id=\"$name\" cols=\"30\" rows=\"10\">{$this->getValue($name)}</textarea>";
        } else {
            $input = "<input type=\"$type\" id=\"$name\" name=\"$name\" value=\"{$this->getValue($name)}\">";
        }

        return $this->surround($label . $input);
    }

    public function select(string $name, string $label, $options):string
    {
        $label = "<label for=\"$name\">$label :</label>";

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