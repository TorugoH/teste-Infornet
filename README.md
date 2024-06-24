
# API test Infornet

Projeto para um teste pratico de desenvolvedor full stack PHP


## Documentação

[Documentação da API](https://documenter.getpostman.com/view/31904190/2sA3XWbdFV)


## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/TorugoH/teste-Infornet.git
```

Entre no diretório do projeto

```bash
  cd apiPrestadorServico
```
Incie o xampp. Caso não tenha instalado na sua maquina, acesse: 
```bash
  https://www.apachefriends.org/pt_br/download.html
```

Acesse o arquivo .env do projeto e troque a conexão com o banco de dados para os que estacao na sua maquina. Com no exemplo:

  ```bash
  DB_CONNECTION=mysql
  DB_HOST=SEU_IP
  DB_PORT=SUA_PORTA
  DB_DATABASE=laravel
  DB_USERNAME=SEU_USUARIO
  DB_PASSWORD=SUA_SENHA
  ```
Inicie o migration para criar as tabelas

```bash
  php artisan migration
```

Abra o php myAdmim para popular o banco, para isso digite no seu navegador:

```bash
http://localhost/phpmyadmin/index.php
```
Rode os seguintes comandos na ordem:

```bash

1- Popular informações sobre serviços:

    INSERT INTO 
      servicos (nome, situacao) 
    VALUES 
      ('Troca de pneu', 'Ativo'), 
      ('Reboque', 'Ativo'), 
      ('Socorro mecanico', 'Ativo'), 
      ('Carga na bateria', 'Ativo'), 
      ('Abastecimento emergencial', 'Inativo'), 
      ('Chaveiro', 'Pendente'), 
      ('Assistencia a acidentes', 'Ativo'), 
      ('Rastreamento', 'Inativo'), 
      ('Motorista Amigo', 'Pendente'), 
      ('Solicitar carro reserva', 'Ativo');

2 - Dados dos prestaodrea de serviços
  
 INSERT INTO 
    Prestador (nome, logradouro, numero, bairro, latitude, longitude, cidade, UF, situacao) 
  VALUES
    ('Ana Clara Oliveira', 'Pç. Dr. Amador A. Silva', 151, 'Centro', -19.973763, -44.019039, 'Abaeté', 'MG', 'Ativo'),
    ('Lucas Silva', 'Rua Deodoro de Almeida Pinto', 166, 'Centro', -19.590843, -46.938947, 'Águas Formosas', 'MG', 'Ativo'),
    ('Maria Eduarda Santos', 'Av. Raul Soares', 104, 'Centro', -19.921026, -43.951013, 'Aimorés', 'MG', 'Ativo'),
    ('João Pedro Costa', 'Rua Coronel Oscar Cortes', 254, 'Centro', -16.853090, -42.067598, 'Além Paraíba', 'MG','Ativo'),
    ('Beatriz Almeida', 'Pç. Getúlio Vargas', 334, 'Centro', -21.213606, -43.760175, 'Alfenas', 'MG', 'Ativo'),
    ('Gabriel Pereira', 'Av. Jovino Fernandes Salles', 1240, 'Jardim Alvorada', -20.290429, -45.541925, 'Alfenas', 'MG', 'Ativo'),
    ('Larissa Mendes', 'Rua Hermano Souza', 105, 'Centro', -19.968504, -44.197895, 'Almenara', 'MG', 'Ativo'),
    ('Matheus Fernandes', 'Av. Governador Valadares', 539, 'Centro', -20.863218, -46.387522, 'Alpinópolis', 'MG', 'Ativo'),
    ('Isabella Rocha', 'Rua Coronel Oliveira', 310, 'Centro', -21.423703, -45.969049, 'Andradas', 'MG', 'Ativo'),
    ('Rafael Souza', 'Av. Doutor Nuno Melo', 286, 'Centro', -19.855703, -43.960448, 'Araçuaí', 'MG', 'Ativo'),
    ('Júlia Ribeiro', 'Av. Tiradentes', 381, 'Centro', -19.491724, -41.062189, 'Araguari', 'MG', 'Ativo'),
    ('Leonardo Gonçalves', 'Av. Antônio Carlos', 83, 'Centro', -18.652348, -48.192374, 'Araxá', 'MG', 'Ativo'),
    ('Mariana Azevedo', 'Av. Governador Valadares', 383, 'Centro', -19.943338, -43.477881, 'Arcos', 'MG', 'Ativo'),
    ('Bruno Lima', 'Rua José Alberto Pelúcio', 63, 'Centro', -19.157803, -45.446122, 'Baependi', 'MG', 'Ativo'),
    ('Sofia Martins', 'Rua José Augusto Chaves', 388, 'Centro', -21.427191, -45.947251, 'Bambuí', 'MG', 'Ativo'),
    ('Guilherme Barbosa', 'Av. Wilson Alvarenga de Oliveira', 410, 'Viúva', -20.620429, -44.735362, 'Barão de Cocais', 'MG', 'Ativo'),
    ('Camila Teixeira', 'Rua Quinze de Novembro', 200, 'Centro', -22.071625, -46.573856, 'Barbacena', 'MG', 'Ativo'),
    ('Pedro Henrique Carvalho', 'Av. Governador Bias Fortes', 841, 'Caminho Novo', -21.881367, -42.697879, 'Barbacena', 'MG', 'Ativo'),
    ('Laura Monteiro', 'Rua Tupinambás', 462, 'Centro', -17.082124, -40.933570, 'Belo Horizonte', 'MG', 'Ativo'),
    ('Enzo Moura', 'Av. Afonso Vaz de Melo', 399, 'Barreiro', -16.182110, -40.695040, 'Belo Horizonte', 'MG', 'Ativo'),
    ('Manuela Castro', 'Av. Augusto de Lima', 1578, 'Barro Preto', -21.958838, -44.890283, 'Belo Horizonte', 'MG', 'Ativo'),
    ('Davi Farias', 'Av. Presidente Antônio Carlos', 7636, 'Pampulha', -20.010747, -45.979099, 'Belo Horizonte', 'MG', 'Ativo'),
    ('Luiza Nogueira', 'Rua Júlio Pereira da Silva', 86, 'Cidade Nova', -19.888926, -43.928036, 'Belo Horizonte', 'MG', 'Ativo'),
    ('Gustavo Almeida', 'Rodovia BR 381 KM',  292, 'São João', -21.222092, -43.772172, 'Betim', 'MG', 'Ativo'),
    ('Helena Cardoso', 'Av. Governador Valadares', 445, 'Centro', -19.917469, -43.938711, 'Betim', 'MG', 'Ativo');


3 - Dados tabela de serviços por Prestador

  INSERT INTO 
    tabela_servico_prestadors (idPrestador, idServico, kmDeSaida, valorDeSaida, valorPorKmExcedente)
  VALUES
    (1, 1, 218, 249, 11),
    (1, 2, 204, 201, 47),
    (1, 3, 66, 261, 81),
    (2, 4, 238, 219, 48),
    (2, 1, 193, 283, 97),
    (2, 9, 243, 183, 58),
    (3, 8, 38, 296, 72),
    (3, 7, 37, 298, 55),
    (3, 1, 117, 78, 77),
    (4, 3, 183, 227, 22),
    (4, 8, 295, 201, 34),
    (4, 9, 270, 219, 41),
    (5, 6, 218, 213, 19),
    (5, 5, 78, 262, 62),
    (5, 1, 218, 106, 19),
    (6, 2, 81, 168, 63),
    (6, 3, 253, 294, 12),
    (6, 4, 114, 297, 19),
    (7, 8, 157, 99, 71),
    (7, 3, 274, 178, 37),
    (7, 5, 206, 74, 98),
    (8, 6, 241, 174, 45),
    (8, 8, 47, 272, 81),
    (8, 9, 147, 169, 38),
    (9, 10, 41, 112, 76),
    (9, 2, 252, 198, 69),
    (9, 3, 271, 133, 34),
    (10, 10, 284, 220, 44),
    (10, 9, 58, 71, 61),
    (10, 8, 99, 259, 76),
    (11, 3, 59, 169, 32),
    (11, 2, 183, 191, 93),
    (11, 1, 29, 68, 81),
    (12, 6, 268, 64, 64),
    (12, 7, 143, 147, 73),
    (12, 8, 162, 265, 99),
    (13, 10, 210, 252, 95),
    (13, 2, 194, 99, 77),
    (13, 3, 140, 154, 11),
    (12, 9, 243, 121, 34),
    (12, 1, 195, 225, 84),
    (12, 2, 212, 276, 38),
    (14, 3, 111, 249, 92),
    (14, 6, 34, 55, 16),
    (14, 4, 175, 149, 48),
    (15, 2, 34, 103, 54),
    (15, 6, 118, 234, 95),
    (15, 8, 26, 140, 82),
    (16, 4, 158, 134, 22),
    (16, 3, 73, 155, 59),
    (16, 10, 298, 165, 62),
    (17, 6, 85, 284, 28),
    (17, 5, 29, 180, 85),
    (17, 10, 287, 134, 49),
    (18, 3, 286, 295, 37),
    (18, 4, 118, 57, 84),
    (18, 5, 289, 238, 35),
    (19, 5, 16, 145, 65),
    (19, 4, 126, 83, 75),
    (19, 3, 34, 292, 43),
    (20, 2, 243, 162, 40),
    (20, 9, 198, 276, 23),
    (20, 10, 280, 294, 76),
    (21, 1, 68, 191, 11),
    (21, 2, 133, 274, 93),
    (21, 3, 268, 93, 65),
    (22, 4, 129, 278, 42),
    (22, 6, 231, 179, 93),
    (22, 7, 123, 94, 69),
    (23, 8, 258, 207, 23),
    (23, 9, 273, 219, 35),
    (23, 10, 183, 217, 18),
    (24, 2, 229, 83, 31),
    (24, 3, 85, 244, 40),
    (24, 4, 214, 57, 75),
    (25, 5, 220, 167, 67),
    (25, 3, 191, 97, 25),
    (25, 1, 238, 160, 89);

```

## Stack utilizada

**Back-end:** PHP, Laravel

**Banco de dados:** MySQL

**Padrões de projeto e princípios:** SOLID


## Autores

- [Vitor Hugo Silva Ribeiro](https://github.com/TorugoH)

