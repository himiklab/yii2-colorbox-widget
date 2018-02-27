Colorbox Widget for Yii2
========================
A customizable lightbox jQuery plugin for Yii2 based on [Colorbox](http://www.jacklmoore.com/colorbox/).

[![Packagist](https://img.shields.io/packagist/dt/himiklab/yii2-colorbox-widget.svg)]() [![Packagist](https://img.shields.io/packagist/v/himiklab/yii2-colorbox-widget.svg)]()  [![license](https://img.shields.io/badge/License-MIT-yellow.svg)]()

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "himiklab/yii2-colorbox-widget" "*"
```

or add

```json
"himiklab/yii2-colorbox-widget" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
* In view:

```php
use himiklab\colorbox\Colorbox;

<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => 800,
            'maxHeight' => 600,
        ],
    ],
    'coreStyle' => 2
]) ?>
```
