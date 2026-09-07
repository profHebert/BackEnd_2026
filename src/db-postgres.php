<?php

require __DIR__ . '/config.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste de conexão - PostgreSQL (PDO)</title>
</head>
<body>
<h1>Conexão com PostgreSQL via PDO</h1>

<?php
try {
    // Monta a DSN (Data Source Name) de conexão
    $dsn = sprintf(
        'pgsql:host=%s;port=%s;dbname=%s',
        POSTGRES_HOST,
        POSTGRES_PORT,
        POSTGRES_DATABASE
    );

    $pdo = new PDO($dsn, POSTGRES_USER, POSTGRES_PASSWORD, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $versao = $pdo->query('SELECT version() AS versao')->fetch();

    echo '<p style="color:green">Conectado com sucesso ao PostgreSQL!</p>';
    echo '<p>Host: ' . htmlspecialchars(POSTGRES_HOST) . ' | Banco: ' . htmlspecialchars(POSTGRES_DATABASE) . '</p>';
    echo '<p>Versão do servidor: ' . htmlspecialchars($versao['versao']) . '</p>';

    // Cria uma tabela de exemplo (se ainda não existir)
    $pdo->exec('
        CREATE TABLE IF NOT EXISTS alunos (
            id SERIAL PRIMARY KEY,
            nome VARCHAR(100) NOT NULL,
            criado_em TIMESTAMP DEFAULT NOW()
        )
    ');

    // Insere um registro de teste a cada vez que a página é carregada
    $stmt = $pdo->prepare('INSERT INTO alunos (nome) VALUES (:nome)');
    $stmt->execute(['nome' => 'Aluno de teste']);

    // Lista os últimos registros inseridos
    $registros = $pdo->query('SELECT * FROM alunos ORDER BY id DESC LIMIT 5');

    echo '<h2>Últimos registros da tabela "alunos"</h2><ul>';
    foreach ($registros as $linha) {
        printf(
            '<li>#%d - %s (%s)</li>',
            $linha['id'],
            htmlspecialchars($linha['nome']),
            htmlspecialchars($linha['criado_em'])
        );
    }
    echo '</ul>';

} catch (PDOException $e) {
    echo '<p style="color:red">Erro ao conectar no PostgreSQL: ' . htmlspecialchars($e->getMessage()) . '</p>';
}
?>

<p><a href="index.php">&larr; Voltar</a></p>
</body>
</html>
