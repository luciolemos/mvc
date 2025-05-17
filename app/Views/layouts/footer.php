<footer class="bg-dark text-light py-3 mt-auto">
    <div class="container text-center">
        <p class="mb-1 small">
            &copy; PHP Full-Stack <?= date('Y') ?> —
            <a href="http://lattes.cnpq.br/6156274538172427" class="text-white text-decoration-none">
                <i>by</i> Lúcio Lemos
            </a>
        </p>
    </div>
</footer>

<!-- JS e Scripts finais -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
