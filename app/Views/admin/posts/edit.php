<div class="container py-5">
    <h3 class="text-primary mb-4"><i class="bi bi-pencil-square me-2"></i>Editar Post</h3>

    <form method="POST" action="<?= BASE_URL ?>admin/posts/update/<?= $post['id'] ?>">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?= htmlspecialchars($post['titulo']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug (URL)</label>
            <input type="text" name="slug" id="slug" class="form-control" value="<?= htmlspecialchars($post['slug']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="conteudo" rows="8" class="form-control" required><?= htmlspecialchars($post['conteudo']) ?></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= BASE_URL ?>admin/posts" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Atualizar
            </button>
        </div>
    </form>
</div>

