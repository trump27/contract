# 概要 

cakephp 3.5

1. プロジェクト作成＆設定
1. friendsofcake/bootstrap-uiの導入
1. friendsofcake/searchの導入
1. Josegonzalez/Uploadの導入
1. ユーザ認証

# インストール

以降、コマンドはbashで行う。

## composer準備
```
php $(dirname $0)/composer.phar $@
// @php "%~dp0composer.phar" %*
```

## project作成
```bash
composer self-update
composer create-project --prefer-dist cakephp/app:~3 myproj

sed -i -e "s|/config/app.php|#/config/app.php|" .gitignore

# change directory
git init
git add .
git commit -m "initial commit"
```

## アプリケーションの設定

DBをSQliteに設定、他。DB名は適宜変更のこと。

```bash
mydb="contract.db"
sed -i -e "3i $mydb" .gitignore

sed -i -e "s|'APP_DEFAULT_LOCALE', 'en_US'|'APP_DEFAULT_LOCALE', 'ja_JP'|" config/app.php
sed -i -e 's|Driver\\Mysql|Driver\\Sqlite|' config/app.php
sed -i -e "s|'database' => 'my_app'|'database' => ROOT . DS . '$mydb'|" config/app.php
sed -i -e "s|'timezone' => 'UTC'|'timezone' => 'Asia/Tokyo'|" config/app.php

sed -i -e "s|date_default_timezone_set('UTC');|date_default_timezone_set('Asia/Tokyo');|" config/bootstrap.php
```

設定確認
config/app.php
```php
'defaultLocale' => env('APP_DEFAULT_LOCALE', 'ja_JP'),
'driver' => 'Cake\Database\Driver\Sqlite',
'database' => ROOT . DS . 'my.db',

'timezone' => 'Asia/Tokyo',
```

config/bootstrap.php
```php
date_default_timezone_set('Asia/Tokyo');
```

# リソースの追加

bootstrap-uiで使用するjquery, bootstrap(css)等をwebrootにコピーする。

## composerでリソースを取得
```
composer require twbs/bootstrap:~3
composer require components/jquery:~2
composer require components/jqueryui:~1
```

## webrootに配置（コピー）
```bash
mkdir -p webroot/css/bootstrap webroot/js/bootstrap webroot/js/jquery webroot/js/jqueryui webroot/css/jqueryui/themes
# jquery
cp vendor/components/jquery/jquery*.js webroot/js/jquery/
# bootstrap
cp vendor/twbs/bootstrap/dist/js/bootstrap*.js webroot/js/bootstrap/
cp vendor/twbs/bootstrap/dist/css/bootstrap*.css webroot/css/bootstrap/
cp -r vendor/twbs/bootstrap/dist/fonts webroot/css/
# jqueryui
cp vendor/components/jqueryui/jquery-ui*.js webroot/js/jqueryui/
cp -R vendor/components/jqueryui/themes/base/ webroot/css/jqueryui/themes

```

## remove packages
```
composer remove twbs/bootstrap
composer remove components/jqueryui
composer remove components/jquery

git init
git add *
git commit -m "setting up the project"
```

# BootstrapUIの導入＆設定

[導入＆設定](doc/01.bootstrap-ui.md)

この後bakeする。
```
bin/cake bake all -f xxxxxx 
```

# Bake all

1. すべてをbakeする、
```
bin/cake bake all --everything -f
```
2. modelを設定する。(ex.displayField)
2. 再度bakeする。

# Sqliteの操作

[02.sqlite.md](document/02.sqlite.md)
