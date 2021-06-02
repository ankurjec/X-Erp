@servers(['localhost' => '127.0.0.1'])

@story('deploy')
    update-code
    install-dependencies
@endstory

@task('update-code')
    cd /var/www/html/xerp
    git pull origin master
@endtask

@task('install-dependencies')
    cd /var/www/html/xerp
    composer install
@endtask