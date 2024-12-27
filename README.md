# PHPMailerの検証

PHPMailerを使ってメール送信を行うための検証用プログラム。

# Composer

Composerを利用できるようにする。

https://getcomposer.org/doc/00-intro.md

```bash
 % bin/composer --version
Composer version 2.8.4 2024-12-11 11:57:47
PHP version 8.4.2 (/usr/local/Cellar/php/8.4.2/bin/php)
Run the "diagnose" command to get more detailed diagnostics output.
```

## 依存ライブラリのインストール

```bash
 % bin/composer install
```

# 環境変数の設定

.env を作成する

```bash
SMTP_HOST=
SMTP_USER=
SMTP_PASS=
SMTP_PORT=
FROM_EMAIL=
FROM_NAME=
```

# 起動

```bash
 % php -S localhost:8000 -t public
```
