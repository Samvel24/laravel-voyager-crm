# Voyager Micro CRM
 
version: v1.0
 
Voyager Micro CRM (CRM == Customer Relationship Management) (Micro CRM usando las tecnologias laravel y laravel-voyager)
 
 
### SET UP
* Requirements (Already covered with Docker deployment)
	1. Apache/2.4.27 or greater.
	2. MySQL 5.7 or greater.
	3. PHP/7.2.24 or greater.
  
* App Configuration
    1. Add host `voyager.crm.localhost`,
        	see [Edit hosts](https://dinahosting.com/ayuda/como-modificar-el-fichero-hosts).        	
    2. Create `.env` file from `example.env` and set it.
	4. Give Folder permissions:	
	    ```
	    sudo chown -R $USER:www-data storage;
        chmod -R 775 storage;
        sudo chown -R $USER:www-data bootstrap/cache;
        chmod -R 775 bootstrap/cache;
	    ```
	7. Import database from `database/updates/*.sql` into `crm_root` DB
        with `root` user, at `localhost` host, `33063` port.
    8. Set `APP_KEY=base64:JXJSPunrAsJnWEZrwtsrSYWp29CqkgWb/9n9SXIBzT0=` at `.env`.     	
	9. Run `composer install`.
	10. Run `php artisan storage:link`. 
	11. Run `php artisan migrate`. 	

* App Settings 
    1. Browse [/admin/settings](http://voyager.crm.localhost/admin/settings).
* Create Admin User	
    Create Admin User:
    
    ```
    php artisan create-admin-user --user={email-here}
    ```
    
    Example:
    ```
    php artisan create-admin-user --user=admin@adlnetworks.com	
    ```
* Browse at [voyager.crm.localhost](http://voyager.crm.localhost).
 
* Voyager Back Office at [voyager.crm.localhost/admin](http://voyager.crm.localhost/admin).
 
### CONTRIBUTION: Guidelines & Documentation
 
* Database Key Fields, tables and or values:
 
	1. `users.email`: Users email.
 
* Git :
    [Gitflow](http://nvie.com/posts/a-successful-git-branching-model).
* Back End:
    [Laravel 6.x](https://laravel.com/docs/6.x),
    [Laravel Voyager](https://docs.laravelvoyager.com).
* Front End:
    [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction),
 
***
 
2020 [Samuel Ramirez](https://github.com/Samvel24/)