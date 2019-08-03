# CSStatsX SQL Web
A web for [CSStatsX SQL](https://github.com/serfreeman1337/csstatsx-sql) plugin, build with **Laravel 5.8** framework.
## Requirements
* PHP >= 7.1.3 (see [laravel docs](https://laravel.com/docs/5.8/installation#server-requirements))
## Installation
* Use **public** folder as root directory.
* Create **.env** file using **.env.example** as example.
## Web servers configs
### apache subfolder
```
Alias "/stats" "/var/www/csstatsx-sql-web/public"

<Directory "/var/www/csstatsx-sql-web/public">
    Options +FollowSymlinks +Indexes
    AllowOverride All
</Directory>
```
Change **RewriteBase** in **public/.htaccess** file to match your subfolder.
### nginx subfolder
```
location /stats {
    alias /var/www/csstatsx-sql-web/public;
    try_files $uri $uri/ /stats/index.php;

    location ~ ^\/stats\/.*\.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_param  SCRIPT_FILENAME    $request_filename;
	
        fastcgi_pass unix:/run/php/php7.3-fpm.sock;
    }
}
```
See [laravel docs](https://laravel.com/docs/5.8/deployment#nginx) for *domain* config.
