Yii2 Form Builder
=================
A drag and drop form builder with jQuery for Yii2 which built upon to [jQuery FormBuilder](https://github.com/kevinchappell/formBuilder) plugin.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer.phar require meysampg/yii2-formbuilder "*"
```

or add

```
"meysampg/yii2-formbuilder": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by:

```php
use meysampg\formbuilder\FormBuilder;
```

and use it as a widget:

```php
<?= FormBuilder::widget(); ?>
```

Configurations
--------------

There are some properties that let you to easily control over form builder.

| Property | Type | Description | Default Value |
|-----|--------|----------------|---------------|
|accessVariableName| string|JavaScript variable name for accessing to formbuilder contents in JS codes | `'formBuilderJsVariable'` |
|data | array | list of elements for rendering as default elements of form builder| |
|dataType| string| indicates that input and output data must be XML or JSON| `'xml'` |
|elementType| string | HTML tag for form builder constructor | `'div'` |
|messages| array | list of label strings on a desired language | | 
| options | array | list of plugin options, see [FormBuilder Documentations](http://formbuilder.readthedocs.io/en/latest/) | |
|showActionButtons| boolean | indicates that control buttons be showed or not | `false` |

Examples
-------------
```php
<?= FormBuilder::widget([
    'data' => [
        [
            "type" => "header",
            "subtype" => "h1",
            "label" => "Header",
            "class" => "header",
        ],
        [
            "type" => "button",
            "label" => "Button",
            "subtype" => "button",
            "class" => "button-input btn btn-warning",
            "name" => "button-1475845417456",
            "style" => "warning",
        ],
    ],
]); ?>
```
![screen shot 2016-10-08 at 13 00 02](https://cloud.githubusercontent.com/assets/1416085/19212100/2bf6c7e4-8d57-11e6-8d5d-48bea1ceb042.png)

----
```php
<?= FormBuilder::widget([
    'dataType' => 'json' 
]); ?>
```
![screen shot 2016-10-08 at 13 04 32](https://cloud.githubusercontent.com/assets/1416085/19212123/dded3f46-8d57-11e6-9351-e47d210de710.png)

---
```php
<?= FormBuilder::widget([
    'messages' => [
        "autocomplete" => "Autocomplete 23",
    ],
]); ?>
```
![screen shot 2016-10-08 at 13 18 55](https://cloud.githubusercontent.com/assets/1416085/19212220/e4f1ff50-8d59-11e6-8869-fa8d516de26b.png)


ToDo
------
  - Implement multilingual support with `language` property (e.g. use `fa-IR` as `langauge` code). 

Appendix
-------------
### Messages
List of all strings that can be used in `messages` property of configuration.

```php
"addOption" => "Add Option",
"allFieldsRemoved" => "All fields were removed.",
"allowSelect" => "Allow Select",
"allowMultipleFiles" => "Allow users to upload multiple files",
"autocomplete" => "Autocomplete",
"button" => "Button",
"cannotBeEmpty" => "This field cannot be empty",
"checkboxGroup" => "Checkbox Group",
"checkbox" => "Checkbox",
"checkboxes" => "Checkboxes",
"className" => "Class",
"clearAllMessage" => "Are you sure you want to clear all fields?",
"clearAll" => "Clear",
"close" => "Close",
"content" => "Content",
"copy" => "Copy To Clipboard",
"copyButton" => "&#43;",
"copyButtonTooltip" => "Copy",
"dateField" => "Date Field",
"description" => "Help Text",
"descriptionField" => "Description",
"devMode" => "Developer Mode",
"editNames" => "Edit Names",
"editorTitle" => "Form Elements",
"editXML" => "Edit XML",
"enableOther" => "Enable &quot;Other&quot;",
"enableOtherMsg" => "Let users to enter an unlisted option",
"fieldVars" => "Field Variables",
"fieldNonEditable" => "This field cannot be edited.",
"fieldRemoveWarning" => "Are you sure you want to remove this field?",
"fileUpload" => "File Upload",
"formUpdated" => "Form Updated",
"getStarted" => "Drag a field from the right to this area",
"header" => "Header",
"hide" => "Edit",
"hidden" => "Hidden Input",
"label" => "Label",
"labelEmpty" => "Field Label cannot be empty",
"limitRole" => "Limit access to one or more of the following roles:",
"mandatory" => "Mandatory",
"maxlength" => "Max Length",
"minOptionMessage" => "This field requires a minimum of 2 options",
"multipleFiles" => "Multiple Files",
"name" => "Name",
"no" => "No",
"number" => "Number",
"off" => "Off",
"on" => "On",
"option" => "Option",
"optional" => "optional",
"optionLabelPlaceholder" => "Label",
"optionValuePlaceholder" => "Value",
"optionEmpty" => "Option value required",
"other" => "Other",
"paragraph" => "Paragraph",
"placeholder" => "Placeholder",
"placeholders" => [
  "value" => "Value",
  "label" => "Label",
  "text" => "",
  "textarea" => "",
  "email" => "Enter you email",
  "placeholder" => "",
  "className" => "space separated classes",
  "password" => "Enter your password"
],
"preview" => "Preview",
"radioGroup" => "Radio Group",
"radio" => "Radio",
"removeMessage" => "Remove Element",
"remove" => "&#215;",
"required" => "Required",
"richText" => "Rich Text Editor",
"roles" => "Access",
"save" => "Save",
"selectOptions" => "Options",
"select" => "Select",
"selectColor" => "Select Color",
"selectionsMessage" => "Allow Multiple Selections",
"size" => "Size",
"sizes" => [
  "xs" => "Extra Small",
  "sm" => "Small",
  "m" => "Default",
  "lg" => "Large"
],
"style" => "Style",
"styles" => [
  "btn" => [
    "default" => "Default",
    "danger" => "Danger",
    "info" => "Info",
    "primary" => "Primary",
    "success" => "Success",
    "warning" => "Warning"
  ]
],
"subtype" => "Type",
"subtypes" => [
  "text" => ['text', 'password', 'email', 'color', 'tel'],
  "button" => ['button', 'submit'],
  "header" => ['h1', 'h2', 'h3'],
  "paragraph" => ['p', 'address', 'blockquote', 'canvas', 'output']
],
"text" => "Text Field",
"textArea" => "Text Area",
"toggle" => "Toggle",
"warning" => "Warning!",
"value" => "Value",
"viewJSON" => "{  }",
"viewXML" => "&lt;/&gt;",
"yes" => "Yes'
```