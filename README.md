# BeGaming

Este projeto tem como objetivo facilitar a gestão e o acompanhamentos do sistema de bagdes que a Before implantou.

## Como Contribuir?

É possível contribuir de várias formas ao projeto dentre elas são:

 - Desenvolver funcionalidades
 - Sugerir funcionalidades
 - Reportar erros
 - Corrigir erros
 - Aumentar a cobertura de testes
 - Incrementar documentação
 
## Como rodar o projeto local ? [Ubuntu]

A princípio, é preciso ter os seguintes softwares instalados:

- PHP 7.2
- Composer, que pode ser instalado no Ubuntu com os comandos:

1) sudo curl -s https://getcomposer.org/installer | php
2) sudo mv composer.phar /usr/local/bin/composer

- MySQL, que pode ser instalado com os comandos:

1) sudo apt-get update
2) sudo apt-get upgrade
3) sudo apt install mysql-server

- mbstring, PHP cli... Que podem ser instalados no Ubuntu com o comando:

1) sudo apt-get install php-mbstring libnet-libidn-perl php-all-dev php-cgi php-cli

Para começar a rodar o projeto, há os seguintes passos:

- Clonar o projeto do Git
- Rodar o composer install na pasta do projeto
- Rodar os seguintes comandos na pasta do projeto:

1) php artisan key:generate
2) php artisan migrate
3) composer dump-autoload
4) php artisan db:seed
5) php artisan serve

- PRONTO!
 
Por favor leia nosso [Código de Conduta] para detalhes do nosso código de conduta.

[Código de Conduta]: https://github.com/GuilhermeBenitesBefore/begaming/blob/master/CODE_OF_CONDUCT.md
