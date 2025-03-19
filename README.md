# Ponderada Programação

Aplicação Web integrada a uma base de dados usando instância EC2 e DBS da AWS.

[Link do vídeo](https://youtu.be/xfqBGbXwDck?si=j5TR8mTLMQD_ktTU)

## Descrição do Projeto

Este projeto consiste em uma aplicação web desenvolvida em PHP que permite o gerenciamento de músicas em uma base de dados MySQL. A aplicação oferece funcionalidades para adicionar, visualizar e gerenciar músicas.

## Estrutura do Repositório

**add_song.php:** Arquivo responsável pela funcionalidade de adicionar novas músicas ao banco de dados.

**codigo.sql:** Script SQL para criação e configuração da base de dados.

**db_config.php:** Arquivo de configuração da conexão com o banco de dados.

**index.php:** Página principal da aplicação.

**view_song.php:** Arquivo responsável pela visualização das músicas cadastradas.

**README.md:** Este arquivo de documentação.

## Funcionalidades

- Cadastro de músicas com informações como título, artista, álbum e ano de lançamento;
- Visualização de todas as músicas cadastradas

Estruturação da tabela:

| Campo          | Tipo         | Restrições                  | Descrição                     |
| -------------- | ------------ | --------------------------- | ----------------------------- |
| id             | INT          | PRIMARY KEY, AUTO_INCREMENT | Identificador único da música |
| title          | VARCHAR(255) | NOT NULL                    | Título da música              |
| album          | VARCHAR(255) | NOT NULL                    | Nome do álbum                 |
| release_date   | DATE         | NULL                        | Data de lançamento            |
| chart_position | INT          | NULL                        | Posição nas paradas musicais  |
