<div class="container-fluid px-3 px-md-4 py-4">
    <!-- Cabeçalho -->
    <div data-aos="fade-down">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div>
                <h2 class="text-primary mb-1"><i class="bi bi-pencil-square me-2"></i>Novo Post</h2>
                <p class="text-muted mb-2 mb-md-0">Crie e publique seu conteúdo</p>
            </div>
        </div>
    </div>

    <!-- Formulário -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div data-aos="fade-up">
                <form action="<?= BASE_URL ?>admin/posts/store" method="post">
                    <div class="row g-3">
                        <!-- Título -->
                        <div class="col-12">
                            <label for="titulo" class="form-label fw-medium">Título</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                            <div class="form-text">Título principal do post</div>
                        </div>

                        <!-- Slug -->
                        <div class="col-12">
                            <label for="slug" class="form-label fw-medium">Slug (URL)</label>
                            <input type="text" name="slug" id="slug" class="form-control" required>
                            <!--<div class="input-group">
                                <span class="input-group-text"><?/*= BASE_URL */?>blog/</span>
                                <input type="text" name="slug" id="slug" class="form-control" required>
                            </div>-->
                            <div class="form-text"><?= BASE_URL?>blog/</div>
                        </div>

                        <!-- Conteúdo -->
                        <div class="col-12">
                            <label for="conteudo" class="form-label fw-medium">Conteúdo do post</label>
                            <textarea
                                    name="conteudo"
                                    id="conteudo" rows="15"
                                    class="form-control"
                                    placeholder="
                                    Assim quereria eu duplicar o curso da minha vida que foge,
                                    porque aquele que a percorre bem, percorre-a duas vezes.
                                    E neste verdadeiro deleite, nestas distracções que se não compram,
                                    neste estado feliz, eu nem temeria, nem desejaria um destino, mas arrojadamente
                                    diria todas as noites: deixa que amanhã o sol ostente as suas cintilações,
                                    ou se esconda nas nuvens. - Hoje eu vivi.">

                            </textarea>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="col-12 mt-4 pt-3 border-top">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">

                                <div class="d-flex flex-column flex-md-row gap-2 order-md-2 w-100 w-md-auto justify-content-md-end">
                                    <a href="<?= BASE_URL ?>admin/posts" class="btn btn-outline-secondary order-md-1">
                                        <i class="bi bi-arrow-left me-1"></i> Voltar
                                    </a>
                                    <button type="submit" name="action" value="save_continue"
                                            class="btn btn-primary flex-grow-1 flex-md-grow-0">
                                        <i class="bi bi-save me-1"></i> Salvar e Continuar
                                    </button>

                                    <button type="submit" name="action" value="save_exit"
                                            class="btn btn-success flex-grow-1 flex-md-grow-0">
                                        <i class="bi bi-check-circle me-1"></i> Salvar e Sair
                                    </button>

                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#previewModal">
                                        <i class="bi bi-eye me-1"></i> Visualizar
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted small">
            <i class="bi bi-info-circle me-1"></i> Preencha todos os campos obrigatórios
        </div>
    </div>
</div>