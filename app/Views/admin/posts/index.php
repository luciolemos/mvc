<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary"><i class="bi bi-file-earmark-text me-2"></i>Posts do Blog</h3>
        <a href="<?= BASE_URL ?>admin/posts/create" class="btn btn-success">
            <i class="bi bi-plus-lg me-1"></i> Novo Post
        </a>
    </div>

    <?php if (empty($posts)): ?>
        <div class="alert alert-info">Nenhum post encontrado.</div>
    <?php else: ?>

        <form method="GET" class="mb-3 d-flex gap-2">
            <input type="text" name="q" class="form-control" placeholder="🔍 Buscar por título..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
            <tr>
                <th>Título</th>
                <th>Slug</th>
                <th>Autor</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= htmlspecialchars($post['titulo']) ?></td>
                    <td><code><?= htmlspecialchars($post['slug']) ?></code></td>
                    <td><?= htmlspecialchars($post['autor']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($post['criado_em'])) ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>admin/posts/edit/<?= $post['id'] ?>" class="btn btn-sm btn-warning me-2">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= BASE_URL ?>admin/posts/delete/<?= $post['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este post?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</div>

