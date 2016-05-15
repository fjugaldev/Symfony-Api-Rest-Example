Symfony2 Api Rest Example
===========================

This project shows and example about how to build an api rest using Symfony2 and FOSRestBundle.

For this project we have used the following bundles:

1. FOSUserBundle (https://github.com/FriendsOfSymfony/FOSRestBundle)
1. JMSSerializerBundle (https://github.com/schmittjoh/JMSSerializerBundle)
1. NelmioCorsBundle (https://github.com/nelmio/NelmioCorsBundle)
1. DoctrineFixturesBundle(https://github.com/doctrine/DoctrineFixturesBundle)

### To run the project you need to: ###

1. run composer install
1. edit parameters.yml to set your mysql user, password and database name
1. run php app/console doctrine:database:create
1. run php app/console doctrine:schema:create
1. run php app/console doctrine:fixtures:load
1. open your browser and go to http://localhost/{your_project_folder}/app_dev.php/api/tasks to get via
api rest all the tasks from database or go to http://localhost/{your_project_folder}/app_dev.php/api/task/{id}
(replace {id} with 1, 2 or 3, example: http://localhost/{your_project_folder}/app_dev.php/api/task/1) to
get a custom task.


