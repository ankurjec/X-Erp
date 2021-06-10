@servers(['localhost' => '127.0.0.1'])

@story('deploy')
    update-code
    run-migrations
@endstory

@task('update-code')
    cd /var/www/html/xerp
    git pull origin master
@endtask

@task('run-migrations')
    cd /var/www/html/xerp
    php artisan migrate --force
@endtask

@task('install-dependencies')
    cd /var/www/html/xerp
    composer install
@endtask