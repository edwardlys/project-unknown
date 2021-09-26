How to launch code
1. Setup your XAMPP
2. Put this code into htdocs
3. Set XAMPP virtualhost to point to directory {htdocs-directory}/project-unknown/src/public
4. Do composer install
5. run `php artisan key:generate`
6. Setup your DB credentials
7. run `php artisan migrate`