<?php
// app/Views/layouts/admin.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - MyApp MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/css/admin.css" rel="stylesheet">
</head>
<body class="admin-body">

<!-- Top Navbar -->
<?php include_once __DIR__ . '/admin_header.php'; ?>

<div class="admin-layout d-flex">

    <!-- Sidebar -->
    <?php include_once __DIR__ . '/admin_sidebar.php'; ?>

    <!-- Conteúdo Principal -->
    <main class="content-area flex-grow-1">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="bg-light px-4 py-2 border-bottom">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="p-4">
            <?php if (!empty($_SESSION['toast'])): ?>
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div class="toast align-items-center text-white bg-<?= $_SESSION['toast']['type'] ?> border-0 show shadow" role="alert">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi <?= $_SESSION['toast']['type'] === 'success' ? 'bi-check-circle' : 'bi-exclamation-triangle' ?> me-2"></i>
                                <?= htmlspecialchars($_SESSION['toast']['message']) ?>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                        </div>
                    </div>
                </div>
                <?php unset($_SESSION['toast']); ?>
            <?php endif; ?>

            <?php
            if (isset($GLOBALS['view'])) {
                $path = '../app/Views/' . $GLOBALS['view'] . '.php';
                if (file_exists($path)) {
                    require $path;
                } else {
                    echo '<div class="alert alert-danger">View <code>' . htmlspecialchars($path) . '</code> não encontrada.</div>';
                }
            }
            ?>
        </div>
    </main>
</div>

<!-- Footer -->
<?php /*include_once __DIR__ . '/admin_footer.php'; */?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const editor = document.querySelector('#conteudo');
        if (editor) ClassicEditor.create(editor).catch(err => console.error(err));
    });
</script>



<!-- JS e Scripts finais -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

<!-- Mermaid.js -->
<script type="module">
    import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
    mermaid.initialize({ startOnLoad: true });
</script>

<!-- Copiar comandos -->
<script>
    function copiarComandos() {
        const texto = document.getElementById("blocoComandos").innerText;
        navigator.clipboard.writeText(texto).then(() => {
            alert("Comandos copiados!");
        }).catch(err => {
            alert("Erro ao copiar: " + err);
        });
    }
</script>


</body>
</html>
