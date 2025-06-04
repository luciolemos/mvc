<div class="container-fluid px-3 px-md-4 py-4">
    <!-- Cabeçalho -->
    <div data-aos="fade-down">
        <h2 class="text-primary"><i class="bi bi-database me-2"></i> Scripts de Criação das Tabelas do Banco de Dados</h2>
        <p class="lead text-muted">
            Estes scripts são utilizados para criar as tabelas do nosso sistema no <strong>MySQL</strong>, um dos sistemas de gerenciamento de banco de dados mais populares e amplamente utilizados no mundo do desenvolvimento web.
        </p>
    </div>

    <hr class="my-4">

    <!-- Introdução ao MySQL -->
    <div class="mb-5" data-aos="fade-up">
        <h4 class="text-primary"><i class="bi bi-info-circle-fill me-2"></i>O que é o MySQL?</h4>
        <p>
            O <strong>MySQL</strong> é um sistema de gerenciamento de banco de dados relacional (SGBD) de código aberto, baseado em linguagem SQL (Structured Query Language).
            Ele permite armazenar, manipular e recuperar dados de forma eficiente, sendo ideal para aplicações web em PHP.
        </p>
    </div>

    <!-- Scripts SQL das Tabelas -->
    <?php
    $tabelas = [
        'pessoal' => 'Tabela que armazena os dados dos funcionários vinculados a obras e funções.',
        'equipamentos' => 'Tabela com os dados dos equipamentos cadastrados, incluindo modelo, marca, e estoque.',
        'obras' => 'Tabela que representa obras ou serviços executados pela empresa.',
        'funcoes' => 'Tabela com os cargos/funções exercidas por colaboradores.',
        'categorias_equipamentos' => 'Tabela usada para classificar equipamentos por categoria.'
    ];

    foreach ($tabelas as $nome => $descricao):
        ?>
        <div class="mb-5" data-aos="fade-up">
            <h4 class="text-primary"><i class="bi bi-table me-2"></i>Script SQL: <code><?= $nome ?></code></h4>
            <p class="text-muted"><?= $descricao ?></p>

            <div class="position-relative bg-dark text-light rounded p-4 shadow-sm border border-primary">
                <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2" onclick="copiarTabela('<?= $nome ?>')">
                    <i class="bi bi-clipboard"></i> Copiar
                </button>

                <pre id="<?= $nome ?>" class="mb-0"><code>
<?= htmlspecialchars(file_get_contents("sql/schemas/{$nome}.sql")) ?>
                </code></pre>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Dica final -->
    <div class="alert alert-info mt-4" data-aos="fade-in">
        <i class="bi bi-lightbulb-fill text-warning me-2"></i>
        Dica: para listar todos os bancos de dados no seu MySQL, use o comando:
        <pre class="mt-3"><code>mysql> SHOW DATABASES;</code></pre>
    </div>
</div>

<!-- Script de cópia -->
<script>
    function copiarTabela(id) {
        const texto = document.getElementById(id).innerText;
        navigator.clipboard.writeText(texto)
            .then(() => alert("📋 Script copiado com sucesso!"))
            .catch(err => alert("Erro ao copiar: " + err));
    }
</script>
