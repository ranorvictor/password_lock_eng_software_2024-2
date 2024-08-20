# Password Lock

> [Clique aqui](https://www.youtube.com) para acessar o vídeo de apresentação do projeto.

## Índice

* [Sobre o projeto](#sobre-o-projeto)
* [Descrição do projeto](#descrição-do-projeto)
* [Objetivo do projeto](#objetivo-do-projeto)
* [Requisitos implementados](#requisitos-implementados)
* [Configuração do projeto](#configuração-do-projeto)
* [Execução do projeto](#execução-do-projeto)

## Sobre o projeto

**Instituição**: Universidade Federal do Tocantins (UFT)
**Curso**: Ciência da Computação
**Disciplina**: Engenharia de Software
**Período**: 2024/2
**Professor**: Edeilson Milhomem da Silva
**Alunos**: Murilo Valiati, Jorge Antonio Braga, Rafael Pacini e Ranor Victor Araújo

## Descrição do projeto

O Password Lock é uma aplicação destinada a armazenar, organizar e proteger informações de login de usuários de maneira segura e eficiente. A interface é intuitiva e fácil de usar, garantindo que tanto usuários experientes quanto iniciantes possam utilizar o sistema sem dificuldades.

## Objetivo do projeto

O projeto visa desenvolver uma ferramenta que permite que os usuários gerenciem suas senhas de forma prática, oferecendo funcionalidades como geração de senhas fortes, criptografia de dados, e sincronização segura entre dispositivos.

## Requisitos implementados

## Configuração do projeto

1. O primeiro passo para a configuração do projeto é a instalação do [LAMP](https://www.digitalocean.com/community/tutorial-collections/how-to-install-lamp) (se estiver utilizando Linux), [WAMP](https://sourceforge.net/projects/wampserver/) (se estiver utilizando Windows) ou [MAMP](https://documentation.mamp.info/en/MAMP-Mac/Installation/) (se estiver utilizando Mac), que são ambientes de desenvolvimento web com PHP. A sigla remete a: **L**inux/**W**indows/**M**ac + **A**pache + **M**ySQL + **P**HP.

2. Instalação do Composer, o gerenciador de pacotes do php:

    ```sh
    curl -sS https://getcomposer.org/installer | php
    ```

3. Adicione o pacote Phinx (para auxiliar no banco de dados) as dependências do projeto:

    ```sh
    php composer.phar require robmorgan/phinx
    ```

4. Instale o Phinx:

    ```sh
    php composer.phar install
    ```

5. Modifique o arquivo *phinx.json* de acordo com os seus dados:

    ```json
    {
      "paths": {
          "migrations": "%%PHINX_CONFIG_DIR%%/db/migrations",
          "seeds": "%%PHINX_CONFIG_DIR%%/db/seeds"
      },
      "environments": {
          "default_migration_table": "phinxlog",
          "default_environment": "development",
          "production": {
              "adapter": "prod_db",
              "host": "prod_host",
              "name": "prod_db_name",
              "user": "prod_user",
              "pass": "prod_pass",
              "port": 3306,
              "charset": "utf8"
          },
          "development": {
              "adapter": "dev_db",
              "host": "dev_host",
              "name": "dev_db_name",
              "user": "dev_user",
              "pass": "dev_pass",
              "port": 3306,
              "charset": "utf8"
          },
          "testing": {
              "adapter": "test_db",
              "host": "test_host",
              "name": "test_db_name",
              "user": "test_user",
              "pass": "test_pass",
              "port": 3306,
              "charset": "utf8"
          }
      },
      "version_order": "creation"
    }
    ```

6. Por fim, rode as migrações para criar as tabelas:

    ```sh
    ./vendor/bin/phinx migrate
    ```

## Execução do projeto
