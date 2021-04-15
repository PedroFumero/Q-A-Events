# Q&A Event
## _Simple tool to build a small forum_

Build on laravel, to run the project you need follow these steps.

- Clone the project.
- Create an `.env` file inside the root directoty (you can clone `.env.example` file).
- Create a database and complete `.env` file with credentials.
- Build an *APP_KEY* with the following command `php artisan key:generate`.
- Generate the initial tables to work with `php artisan migrate:fresh --seed`.
- After running the previous step you'll have two default users for testing purposes.
- Before running the project you need to install all dependencies of composer and npm, run `composer install` and `npm install`.
- You're ready to go, run the server `php artisan serve`.

## Testing users
#### Moderator
- email: `moderator@test.com`
- password: `123123123`

#### Participant
- email: `participant@test.com`
- password: `123123123`