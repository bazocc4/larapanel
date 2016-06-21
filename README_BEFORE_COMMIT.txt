1.) Inverse seed generator (iSeed) is a Laravel package that provides a method to generate a new seed file based on data from the existing database table.

Examples:
php artisan iseed settings,users,user_metas --force --clean

2.) Rollback / Migrate In Single Command
The migrate:refresh command will first roll back all of your database migrations, and then run the migrate command. This command effectively re-creates your entire database:

php artisan migrate:refresh --seed

----------- // -----------