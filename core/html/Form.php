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
    protected $data = [];

    /**
     * Tag used to surrond HTML
     *
     * @var string
     */
    protected string $surround = "div";

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
    protected function surround(string $html):string
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    /**
     * Return the value at specific index
     *
     * @param string $key
     * @return mixed
     */
    protected function getValue(string $key)
    {
        if(is_object($this->data)){
            $method = 'get' . ucfirst($key);

            if(is_array($this->data->$method())){
                $values = array();
                foreach($this->data->$method() as $row){
                    $values[] = $row->getId();
                }
                return $values;
            }

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

    /**
     * Generate label and its select
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return string
     */
    public function select(string $name, string $label, array $options = [], array $params = []):string
    {
        $label = "<label for=\"$name\">$label :</label>";

        $multiple = '';
        if(isset($params['multiple']) && $params['multiple'] == 1){
            $multiple = 'multiple';
        }

        $select = "<select name=\"$name\" id=\"$name\" $multiple>";

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