<?php

namespace meysampg\formbuilder;

use yii\base\Widget;
use yii\helpers\Inflector;
use yii\base\InvalidConfigException;

class FormBuilder extends Widget
{
    /**
     * @property string HTML tag for form builder constructor
     */
    public $elementType = 'div';

    /**
     * @property string language of form builder
     */
    public $language;

    /**
     * @property array list of elements for rendering as default elements of form builder
     */
    public $data = [];

    /**
     * @property string indicates that input and output data must be XML or JSON
     */
    public $dataType = 'xml';

    /**
     * @property array list of label strings on a desired language.
     */
    public $messages = [];

    /**
     * @property array list of plugin options, see [FormBuilder Documentations](http://formbuilder.readthedocs.io/en/latest/)
     */
    public $options = [];

    /**
     * @property string JavaScript variable name for accessing to formbuilder contents on development
     */
    public $accessVariableName = 'formBuilderJsVariable';

    /**
     * @property boolean indicates that control buttons be showed or not
     */
    public $showActionButtons = false;

    private $view;

    private $arrayToTypeFunction;

    public function init()
    {
        parent::init();

        $this->view = $this->getView();

        if ($this->dataType == 'json') {
            $this->arrayToTypeFunction = 'arrayJsonEncode';
        } else if ($this->dataType == 'xml') {
            $this->arrayToTypeFunction = 'arrayXmlEncode';
        } else {
            throw new InvalidConfigException('Property $dataType must be "xml" or "json".');
        }
    }

    public function run()
    {
        FormBuilderAsset::register($this->view);
        $this->view->registerJs($this->getFBJs());

        return '<' . $this->elementType . ' id="' . $this->fBId . '"></' . $this->elementType . '>';
    }

    /**
     * @return string unique id of form builder
     */
    public function getFBId()
    {
        return $this->id . '-fb-element';
    }

    /**
     * @return string initialize form builder javascript code
     */
    private function getFBJs()
    {

        $str = "var {$this->getFBJsVariableElement()} = $('#{$this->getFBId()}');\n"
             . "var {$this->accessVariableName} = $({$this->getFBJsVariableElement()}).formBuilder({$this->getFBOptions()});\n";

        return $str;
    }

    private function getFBJsVariableElement()
    {
        return lcfirst(Inflector::id2camel($this->getFBId() . '-' . 'variable'));
    }

    private function getFBOptions()
    {
        $this->options = array_merge(
            [
                'dataType' => $this->dataType,
                'formData' => $this->{$this->arrayToTypeFunction}($this->data),
                'showActionButtons' => $this->showActionButtons,
            ],
            $this->options
        );

        if ($this->language) {
            $this->options['i18n'] = [
                'locale' => $this->language,
                'preloaded' => [
                    $this->language => $this->getMessages()
                ],
            ];
        }

        return json_encode($this->options);
    }

    private function getMessages()
    {
        $messages = [];

        if ($this->language) {
            $fileName = __DIR__ . '/messages/' . $this->language . '.php';
            if (file_exists($fileName)) {
                $messages = require($fileName);
            }
        }

        return array_merge($messages, $this->messages);
    }

    private function getLanguage()
    {
        return $this->language ? $this->language : 'en-US';
    }

    private function arrayJsonEncode($options)
    {
        return json_encode($options);
    }

    private function arrayXmlEncode($options, $tag = 'field', $generateHeaderAndFooter = true)
    {
        $xmlString = '';

        if ($generateHeaderAndFooter) {
            $xmlString .= "<form-template>"
                        . "<fields>";
        }

        if (is_array($options)) {
            if (!empty($options)) {
                foreach ($options as $key => $option) {
                    $label = isset($option['label']) ? $option['label'] : '';
                    $attributes = $this->arrayToAttribute($option);

                    if (strlen($attributes)) {
                        $xmlString .= "<$tag"
                                    . $attributes
                                    . ">";
                    }

                    if (is_array($option)) {
                        $xmlString .= $this->arrayXmlEncode($option, Inflector::singularize($key), false);
                    }

                    if ('option' == $tag) {
                        $xmlString .= $label;
                    }

                    if (strlen($attributes)) {
                        $xmlString .= "</$tag>";
                    }
                }
            }
        } else {
            throw new InvalidConfigException('Property $data must be an array.');
        }

        if ($generateHeaderAndFooter) {
            $xmlString .= "</fields>"
                        . "</form-template>";
        }

        return $xmlString;
    }

    private function arrayToAttribute(&$options)
    {
        $str = '';

        foreach ($options as $key => $value) {
            if (is_scalar($value)) {
                $str .= " $key=" . (is_bool($value) ? "'" . var_export($value, 1) . "'" : var_export($value, 1));
                unset($options[$key]);
            }
        }

        return $str;
    }
}
