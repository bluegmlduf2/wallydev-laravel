# Wallydev-laravel

## Introduction

This application is a personal weblog

## Features

-   Creating Posts
-   Creating Comments
-   Translating posts into English and Japanese
-   Displaying posts in English and Japanese
-   Allowing administrator users to manage posts
-   Checking the system log with Slack
-   Adding Metatags for SEO
-   Create Sitemap.xml dynamically
-   Automatic Database Backup (Local & AWS S3)
-   Sending an Email to the Administrator When a New Comment is Posted (Google SMTP)

## Installation & Usage

Required Libraries:

-   Laravel v9.52
-   PHP v8.0.2
-   Mysql 8.0.3
-   [Deepl API](https://www.deepl.com/)  
     After registering for the Deepl translation API, get the app_key issued, and enter the issued key, TRANSLATOR_API_KEY in the .env file
-   [Slack API](https://api.slack.com/)  
    After registering the Incoming Webhooks of the Slack API, enter the app_key issued in the LOG_SLACK_WEBHOOK_URL of the .env file
-   AWS S3  
    By default, you can back up the database locally. When you input AWS S3 information in the env file, it also becomes possible to back up the database to S3.

## Command

-   `php artisan key:generate`
-   `php artisan storage:link`
-   `php artisan config:cache`
-   `php artisan migrate --path=database/migrations/_create_wallydev.php`
-   `composer install`
-   `npm install`
-   `npm run dev`
-   `php artisan serve`
-   `php artisan sitemap:generate` Run only if you create sitemap.xml
-   `php artisan database:backup` Run only if you  manually back up a database

