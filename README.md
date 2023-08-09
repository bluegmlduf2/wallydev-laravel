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

## Installation & Usage

Required Libraries:

-   Laravel v9.52
-   PHP v8.0.2
-   [Papago API](https://developers.naver.com/docs/papago/papago-nmt-overview.md)  
     After registering for the Papago translation API, get the app_key issued, and enter the issued key, TRANSLATOR_CLIENT_ID, and TRANSLATOR_CLIENT_SECRET in the .env file
-   [Slack API](https://api.slack.com/)  
    After registering the Incoming Webhooks of the Slack API, enter the app_key issued in the LOG_SLACK_WEBHOOK_URL of the .env file

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

