# API-Client-ABCP

[API abcp.ru] - Документация по API

В данном классе реализован только метод *Поиск детали по номеру и бренду*

url: search/articles

Пример использования 

> $user - Имя пользователя

> $password - Пароль в md5

>host - http://имя.сайта.public.api.abcp.ru/
            
```php
        $service = new R0dgerV\ApiClientABCP\ApiClient(
            $user,
            $password,
            $host
        );
        $data = [
            'number'=> '0242245571',
            'brand'=>'Bosch'
        ];
        $results = $service->searchArticles($data);
```


[API abcp.ru]: http://docs.abcp.ru/wiki/API:Docs

