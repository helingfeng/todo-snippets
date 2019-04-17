## Composer 自动加载
composer 提供了四种自动加载类型:
- classmap
- psr-0
- psr-4
- files

examples:

```json
"autoload": {
    "files": [
      "app/Standards/common.php"
    ],
    "classmap": [
      "database"
    ],
    "psr-4": {
      "App\\": "app/"
    }
}
```

这几种自动加载平常的框架都用到，通常来看，项目代码用 psr-4 自动加载， 如Laravel框架的函数库 helper 用 files 自动加载，development 相关用 classmap 自动加载，而 psr-0 已经弃用，有事兼容古老的代码还会用到。

### classmap
composer 会扫描指定目录下以 `.php` 或 `.inc` 结尾的文件中的 class ，生成 class 到指定 file-path 的映射(Key-Value)，并加入新生成的 `vendor/composer/autoload_classmap.php` 文件中

例如：配置扫描路径src
```json
{
  "autoload": {
    "classmap": ["src/"]
  }
}
```
其生成结果如下

```php
<?php
return array(
    'BaseController' => $baseDir . '/src/BaseController.php'
);
?>
```
### psr-4
在composer.json里是这样进行配置的：

{
  "autoload": {
    "psr-4": {
      "Foo\\": "src/"
    }
  }
}
执行composer install更新自动加载。照PSR-4的规则，当在index.php中试图new Foo\Bar\Baz这个class时，composer会自动去寻找 src/Bar/Baz.php" 这个文件，如果它存在则进行加载。

### files

```json
{
  "autoload": {
    "files": ["src/MyLibrary/functions.php"]
  }
}
```

执行composer install更新自动加载。Files方式，就是手动指定供直接加载的文件。比如说我们有一系列全局的helper functions，可以放到一个helper文件里然后直接进行加载，也就是说，当你用require 'vendor/autoload.php'加载自动加载类时自动将files里的文件加载进来了，你直接使用就行了。