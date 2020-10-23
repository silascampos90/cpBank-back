Após o clone e acessar a pasta cpBank-back

Renomei o .env.sqlite para .env

## Executar as atualizações

````
composer install

````
## criar DB
``````
touch database/laravel.sqlite

``````

# executar as migrate e seed

`````
php artisan migrate
php aritsan db:seed

````


Conta 1 CPF: 85257346591 Senha: 123456

Conta 2 CPF: 13101797004 Senha: 123456

# Erros possívels

Jwt Authentication error Argument 3 passed to Lcobucci\JWT\Signer\Hmac::doVerify()

# Executar a lista de comandos

php artisan key:generate
php artisan jwt:secret
php artisan cache:clear
php artisan config:clear
