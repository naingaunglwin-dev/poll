<div align="center">

# Poll
(Simple Polling web app)

</div>

## About
This is a simple polling web app that allows users to create a poll with at least two options from a list of multiple poll options. Once created, a unique shareable link is generated for each poll, which users can distribute. Anyone with the link can participate by voting for their preferred option, making it a convenient tool for quick surveys and decision-making.

## Requirement
- **PHP** version 8.1 or newer is required
- **Nodejs** version 14.0.0 or newer is required. (Optional unless you want to use tailwindcss)

## Installation
- clone repo `https://github.com/naingaunglwin-dev/poll.git`
- navigate to the project root directory in your terminal
- run `composer install`
- run `npm install` (Only if you want to use tailwindcss)

## Setup
- copy `env` file to `.env`
- Update `app.baseURL` in `.env`
- create a new database
- setup your database credentials in `.env`
- run `php spark migrate`

## Run
- run `npx tailwindcss -i ./public/assets/css/input.css -o ./public/assets/css/style.css --watch` (if you want to use tailwindcss)
- access `http://localhost/{site-name}/public` from browser

