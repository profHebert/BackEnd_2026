# BackEnd_2026

## Estrutura para as aulas de Programação Back-End - 2026-1

### Prof. Hebert - hebert@uni9.pro.br

## Como abrir o ambiente (GitHub Codespaces)

1. No GitHub, clique em **Code → Codespaces → Create codespace on main**.
2. Aguarde a criação do Codespace: na primeira vez o GitHub vai construir a imagem
   e subir automaticamente três serviços (PHP/Apache, MySQL e PostgreSQL), então
   pode levar 1 a 2 minutos.
3. Quando o Codespace terminar de iniciar, vá na aba **Ports** (Portas) do VS Code
   e abra a porta **8080** no navegador — essa é a aplicação PHP.
4. Espere alguns segundos antes de testar as páginas de banco de dados
   (`db-mysql.php` / `db-postgres.php`): os bancos podem levar alguns segundos
   a mais para ficar prontos após o container subir.

Também é possível rodar tudo localmente com Docker Desktop, usando os scripts
`start.sh`, `stop.sh` e `restart.sh` na raiz do projeto (eles chamam o mesmo
`docker-compose.yml` usado pelo Codespace).

## Serviços disponíveis

| Serviço    | Porta | Descrição                                  |
|------------|-------|---------------------------------------------|
| web        | 8080  | Aplicação PHP 8.2 + Apache (pasta `src/`)   |
| db         | -     | MySQL 8.0 (acessível apenas pelo host `db`) |
| postgres   | -     | PostgreSQL 16 (acessível pelo host `postgres`) |
| phpmyadmin | 8081  | Interface web para o MySQL                  |
| adminer    | 8082  | Interface web para o PostgreSQL (e MySQL)   |

As portas 8080, 8081 e 8082 são encaminhadas (forwarded) automaticamente pelo
Codespace/devcontainer.

## Credenciais de acesso

Ambos os bancos usam as mesmas credenciais de aplicação por simplicidade
didática — **não usar em produção**:

- Banco: `app_db`
- Usuário: `app_user`
- Senha: `app_pass`

MySQL (root, usado pelo phpMyAdmin): usuário `root`, senha `root`.

Do lado do PHP, essas credenciais não ficam espalhadas pelo código: são lidas
de variáveis de ambiente (definidas em `.devcontainer/docker-compose.yml`) no
arquivo `src/config.php`.

## Páginas de exemplo (pasta `src/`)

- `index.php` — página inicial com links para os exemplos.
- `phpinfo.php` — informações da instalação do PHP.
- `db-mysql.php` — exemplo de conexão com MySQL usando PDO (`pdo_mysql`),
  cria uma tabela `alunos` e mostra os últimos registros inseridos.
- `db-postgres.php` — o mesmo exemplo, mas conectando no PostgreSQL usando
  PDO (`pdo_pgsql`).
- `config.php` — centraliza a leitura das credenciais de conexão.

Esses dois arquivos (`db-mysql.php` e `db-postgres.php`) servem como ponto de
partida para os alunos praticarem PDO com bancos diferentes usando
basicamente a mesma sintaxe, mudando só a DSN de conexão.
