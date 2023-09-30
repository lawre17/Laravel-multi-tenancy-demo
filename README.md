#Larave with Stancl tenancy

-Links
composer create-project laravel/laravel
composer require stancl/tenancy - for tenacy package

#Notes

1. Since on shared hosting once cannot create databases programatically, I modified the code at the tenancyserviceprovider to allow user to select pre-populated databases
2. using the register routes there is a dropdown to gets all databases from the db server and you have to only choose from there and provide a name for the tenant
