<div class="container">
    <div data-aos="fade-down">
        <h2 class="text-primary"><i class="bi bi-kanban-fill me-2"></i> Visão Geral do Sistema</h2>
        <p class="lead text-muted">Resumo da evolução e próximos passos do painel administrativo.</p>
    </div>
    <hr class="my-4">

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- 📦 CARDS DE STATUS -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">✅ Sistema Iniciado</div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="small">Estrutura MVC conectada</span>
                    <i class="bi bi-check-circle-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">🧱 Layout Modular</div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="small">Header, Sidebar, Footer</span>
                    <i class="bi bi-layout-sidebar-inset-reverse"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-dark mb-4">
                <div class="card-body">🚧 CRUDs em Progresso</div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span class="small">Usuários, Categorias</span>
                    <i class="bi bi-tools"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">📝 Documentação</div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a class="text-white small" href="<?= BASE_URL ?>admin/docs/estrutura">Ver Documentos</a>
                    <i class="bi bi-journal-code"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- 💬 INFORMAÇÃO GERAL -->
    <div class="card mb-4">
        <div class="card-body">
            O projeto está estruturado em MVC com namespaces para Admin, Site e Docs. A autenticação está funcionando e já foi implementado o CRUD de posts com CKEditor, session-based toasts e layout responsivo com Bootstrap 5.
        </div>
    </div>

    <!-- 🔮 PLANEJAMENTO -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <i class="bi bi-calendar-check me-1"></i> Próximos passos
        </div>
        <div class="card-body">
            <ul>
                <li>✅ Finalizar controle de usuários com validação</li>
                <li>✅ Refatorar controller de posts com políticas de segurança</li>
                <li>🔄 Implementar painel de estatísticas e logs de acesso</li>
                <li>📁 Separar documentação por módulos com navegação</li>
                <li>🚀 Publicar a versão final no GitHub e ativar CI/CD</li>
            </ul>
        </div>
    </div>

    <!-- 📅 FOOTER -->
    <p class="text-end text-muted small">Última atualização: <?= date('d/m/Y') ?> • Desenvolvido com PHP + Bootstrap</p>
</div>
