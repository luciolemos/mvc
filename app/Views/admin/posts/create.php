<div class="container">
    <!-- 🧭 TÍTULO PRINCIPAL -->
    <div data-aos="fade-down">
        <h2 class="text-primary"><i class="bi bi-pencil-square me-2"></i>Novo Post</h2>
        <p class="lead text-muted">Aqui você cria e publica seu post. Seja bem vindo!</p>
    </div>
    <hr class="my-4">

    <div data-aos="fade-up">
    <form action="<?= BASE_URL ?>admin/posts/store" method="post">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug (URL)</label>
            <input type="text" name="slug" id="slug" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" rows="8" class="form-control"></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= BASE_URL ?>admin/posts" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Voltar
            </a>
            <div>
                <button type="submit" name="action" value="save_continue" class="btn btn-outline-primary me-2">
                    <i class="bi bi-plus-circle me-1"></i> Salvar e Continuar
                </button>
                <button type="submit" name="action" value="save_exit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Salvar
                </button>
            </div>
        </div>
    </form>
    </div>
</div>
<hr class="mt-5">
<p class="text-end text-muted small">Última atualização: <?= date('d/m/Y') ?> • Desenvolvido com PHP</p>


