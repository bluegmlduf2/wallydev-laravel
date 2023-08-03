# Wallydev-laravel

## Introduction

This application is a personal weblog

## Features

-   Create Posts
-   Create Comments
-   Translating posts into English and Japanese
-   Display posts in English and Japanese
-   Administrator users can manage posts
-   Cheking the system log with Slack
-   Metatag For SEO

## Installation & Usage

Required Libraries:

-   Laravel v9.52
-   PHP v8.0.2
-   [Papago API](https://developers.naver.com/docs/papago/papago-nmt-overview.md)  
     After registering the Papago translation api, get the app_key issued. And the issued key
    Enter the TRANSLATOR_CLIENT_ID and TRANSLATOR_CLIENT_SECRET in the env file
-   [Slack API](https://api.slack.com/)  
    After registering the Incoming Webhooks of the black api, enter the app_key issued in the LOG_SLACK_WEBHOOK_URL of the env file

## Command

-   `php artisan key:generate`
-   `php artisan storage:link`
-   `php artisan config:cache`
-   `php artisan migrate --path=database/migrations/_create_wallydev.php`
-   `php artisan serve`
-   `npm run dev`