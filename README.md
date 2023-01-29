<p align="center">
<img src="info/logo.jpg">
</p>
 
## MrpProfile
Кароч изи пакет 
   

## Установка из composer

```  
composer require slavawins/mrp-profile
```

 Опубликовать js файлы, вью и миграции необходимые для работы пакета.
Вызывать команду:
```
php artisan vendor:publish --provider="MrpProfile\Providers\MrpProfileServiceProvider"
``` 

 В роутере routes/web.php удалить:
 добавить
 ```
    \MrpProfile\Library\MrpProfileRoute::routes();
 ```

Выполнить миграцию
 ```
    php artisan migrate 
 ``` 
