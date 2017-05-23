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
|language| string| Desired language for showing form builder (See translation section)| |
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

---
```php
<?= FormBuilder::widget([
    'language' => 'fa-IR',
]); ?>
```
![formbuilder-fa](https://cloud.githubusercontent.com/assets/1416085/20057738/71b873dc-a502-11e6-9956-ef877bb13820.png)

Translation
-----------

Simply copy `en.php` file in `messages` folder and rename it to your language (e.g. `ar`, `fr`, `fa`, `fa-IR` ...), translate strings, commit your changes and send a pull request.
