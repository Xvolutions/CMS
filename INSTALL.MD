Xvolutions CMS
==============

Start by download the vendors

$ php composer.phar install --no-dev

You need to create a new database specifying the configurations on app/config/parameters.yml.
Then you need to add the schemas

$ php app/console doctrine:schema:create

Finally populate the database 

$ php app/console xvolutions:admin:initiate <USERNAME> <NAME> <PASSWORD> <EMAIL>

simply access to <host>/admin and ready to login ;)

That's it