## About this Laravel API

This Laravel API is to act as a backend API for our app and to also act as an oAuth2 authentication server.
Laravel Passport is Laravel's built-in library that integrates oAuth2 client and server functionality, allowing us to
create clients and manage tokens for users to authenticate and user the app with.

## Requirements

To set up a working environment for the Laravel API, you need the following installed:

- php 8.1
- composer
- xdebug

## Quick Start

#### Before we serve the application, we need ensure that our environment is ready to serve by running the following commands:

- `composer install` - to install the required composer packages
- `composer update` - to update the composer packages
- `composer dump-autoload` - refresh the list of packages required by the app
- `php artisan key:generate` - generate an application encryption key
- `php artisan passport:keys` - to generate Laravel Passport encryption keys

#### We also need to create an oAuth2 client so user authentication is possible:

- run `php artisan passport:client` and follow the steps
- Store the client secret - This is the only time it will be given to you. This is used to send authentication requests
- Store the client id - This is used to send authentication requests

#### Finally, we need to give the correct permissions to the app's directories by running the following:

- run `sudo -S chmod -R 755 ./` - This will set the permissions of the project
- run `sudo -S chmod -R o+w default/storage` - This will provide read and writer access to the storage directory which
  contains the logs

## Using Laravel Passport to authenticate

#### Retrieving an authentication token

To get an authentication token, you need to send a post request to: `oauth/token` with the following parameters:

- `grant_type: password`
- `client_id: *your client id*`
- `client_secret: *your client secret*`
- `username: *user's email address*`
- `password: *user's password*`
- `scope: ` - The scope is representative of the permissions we grant to the user. See the 'oAuth Scopes' to see more
  information

If the provided credentials are correct, this endpoint will return: `token_type`, `expires_in`, `access_token`
and `refresh_token`.
An error message will be sent back otherwise.

To refresh a token, send a post request to `oauth/token` with the following parameters:

- `grant_type: refresh_token`
- `refresh_token: *refresh token*` - Both of the above endpoints will return a refresh token. If you do not have a
  refresh token, run the above endpoint with the password grant type
- `client_id: *your client id*`
- `client_secret: *your client secret*`
- `scope: ` - The scope is representative of the permissions we grant to the user. See the 'oAuth Scopes' to see more
  information

Calling this endpoint will return the same response as the endpoint above with the password grant type.

#### oAuth Scopes

*Do not use the `*` scope under any circumstance as this will give the user access to the entire app.* All of the
authentication scopes for the app are defined in `App\Providers\AuthServiceProvider`.

## Testing

The config file for the phpunit library in the api can be found in the root of the directory as `phpunit.xml`. You can
run tests with `php artisan test`.
You can learn about creating tests [here]('https://laravel.com/docs/9.x/testing#creating-tests').

## Coding Standards and Inspections

It is essential that this app follows psr-12 standards. To enable auto formatting and a psr-12 coding style in PHPStorm,
do the following:

#### Code Style:

- Press `Ctrl + Alt + S` or go to `File > Settings`
- Select `Editor > Code Style > PHP`
- Click `Set from` in the top right corner and select `PSR12`
- Click `Apply`

#### Formatting on save:

- Press `Ctrl + Alt + S` or go to `File > Settings`
- Select `Tools > Action on Save`
- Check the `Reformat code` option
- Click `Apply`

#### Displaying warnings and strict PSR12 standards:

- Press `Ctrl + Alt + S` or go to `File > Settings`
- Select `Editor > Inspections`
- Check the `PHP` option
- Click `Apply`

## Caching

It's essential that we cache routes and queries as and where we can so we are able to have lower response times in our
api calls.

#### Clearing and re-caching Cache

Remember to run the following commands when you edit the parts of the app that they relate to:

- `php artisan cache:clear` - clears all of the cache in the storage folder
- `php artisan config:clear` - clears all of the configuration cache
- `php artisan route:cache` - re-caches all of the routes

#### Queries

Queries should be cached where possible where the key relates to the user's id, for example, 'client_orders_' + user_id.
Query caching examples can be found here: https://laravel.com/docs/9.x/cache#retrieve-store



