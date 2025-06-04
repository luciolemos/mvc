// admin.js

document.addEventListener("DOMContentLoaded", () => {
    // CKEditor
    const editor = document.querySelector('#conteudo');
    if (editor) {
        ClassicEditor.create(editor).catch(err => console.error(err));
    }

    // AOS (scroll animation)
    AOS.init({ duration: 500, once: true });

    // Sidebar toggle (mobile)
    const sidebar = document.querySelector('.admin-sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('sidebarToggle');

    function openSidebar() {
        sidebar?.classList.add('active');
        overlay?.classList.add('active');
        document.body.classList.add('sidebar-active');
    }

    function closeSidebar() {
        sidebar?.classList.remove('active');
        overlay?.classList.remove('active');
        document.body.classList.remove('sidebar-active');
    }

    toggle?.addEventListener('click', openSidebar);
    overlay?.addEventListener('click', closeSidebar);

    // CPF mask
    document.querySelectorAll('.cpf-mask').forEach(input => {
        input.addEventListener('input', e => {
            let v = e.target.value.replace(/\D/g, '');
            if (v.length > 11) v = v.slice(0, 11); // força limite de 11 dígitos
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            e.target.value = v;
        });
    });

    // Copiar comandos (mermaid docs, etc)
    const copiarBtn = document.getElementById("copiarComandos");
    const blocoComandos = document.getElementById("blocoComandos");
    if (copiarBtn && blocoComandos) {
        copiarBtn.addEventListener("click", () => {
            navigator.clipboard.writeText(blocoComandos.innerText)
                .then(() => alert("Comandos copiados!"))
                .catch(err => alert("Erro ao copiar: " + err));
        });
    }

    // Telefone mask (celular com DDD)
    document.querySelectorAll('.phone-mask').forEach(input => {
        input.addEventListener('input', e => {
            let v = e.target.value.replace(/\D/g, '').substring(0, 11);

            if (v.length >= 11) {
                v = v.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, '($1) $2-$3-$4');
            } else if (v.length >= 7) {
                v = v.replace(/^(\d{2})(\d{1})(\d{0,4})$/, '($1) $2-$3');
            } else if (v.length >= 3) {
                v = v.replace(/^(\d{2})(\d{0,1})$/, '($1) $2');
            } else {
                v = v.replace(/^(\d{0,2})$/, '($1');
            }

            e.target.value = v.trim();
        });
    });




    // CEP mask
    document.querySelectorAll('.cep-mask').forEach(input => {
        // Impede digitar caracteres não numéricos
        input.addEventListener('keypress', e => {
            if (e.key.match(/\D/)) e.preventDefault();
        });

        // Formata enquanto digita
        input.addEventListener('input', function(e) {
            let v = e.target.value.replace(/\D/g, '');
            if (v.length > 5) {
                v = v.replace(/^(\d{5})(\d{0,3})/, '$1-$2');
            }
            e.target.value = v.substring(0, 9);
        });

        // Formata ao sair do campo (caso o usuário não tenha digitado o hífen)
        input.addEventListener('blur', function(e) {
            let v = e.target.value.replace(/\D/g, '');
            if (v.length > 5) {
                v = v.replace(/^(\d{5})(\d{3})/, '$1-$2');
                e.target.value = v;
            }
        });
    });
});



