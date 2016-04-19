# yii2-yee-block

##Yee CMS - HTML Block Module

####Backend module for managing blocks 

This module is part of Yee CMS (based on Yii2 Framework).

Block module lets you easily create HTML blocks on your site. 

Installation
------------

- Either run

```
composer require --prefer-dist yeesoft/yii2-yee-block "*"
```

or add

```
"yeesoft/yii2-yee-block": "*"
```

to the require section of your `composer.json` file.

- Run migrations

```php
yii migrate --migrationPath=@vendor/yeesoft/yii2-yee-block/migrations/
```

Configuration
------
- In your backend config file

```php
'modules'=>[
	'block' => [
		'class' => 'yeesoft\block\BlockModule',
	],
],
```

Usage
---

- Widget namespace:
```php
use yeesoft\block\models\Block;
```

- Render HTML Block by slug:

```php
echo Block::getHtml('block-slug'); 
```

- You can use variables in your HTML Blocks. Example:
  
  example of block with variables:
```php
<div class="some-class">
    <a href="{{link}}">{{title}}</a>
</div>
```
  
  render block with variables:
```php
echo Block::getHtml('block-slug', ['link' => 'http://www.example.com/', 'title' => 'Example Site']); 
```

