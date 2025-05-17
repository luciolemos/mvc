    
    
    ├── app/
    │   ├── Controllers/
    │   │   ├── AboutController.php        # Página "Sobre"
    │   │   ├── AdminController.php        # Página "Admin"
    │   │   ├── BlogtController.php        # Página "Blog"
    │   │   ├── ContactController.php      # Contato + envio de email"
    │   │   ├── CoverageController.php     # Página "Coverage"
    │   │   ├── DocsController.php         # Páginas da documentação
    │   │   ├── HomeController.php         # Página "Home"
    │   │   ├── PostAdminController.php    # Página "Posts"
    │   │   ├── ReadmeController.php       # Página "Readme"
    │   │   └── StatusController.php       # Página "Status"
    │   │
    │   ├── Core/
    │   │   ├── App.php                    # Núcleo roteador
    │   │   ├── Controller.php            
    │   │   ├── Database.php                 
    │   │   ├── Router.php                 
    │   │   └── View.php  
    │   │           
    │   ├── Helpers/
    │   │   └── SystemVersions.php         # Helpers para versão do sistema
    │   │
    │   ├── Models/
    │   │   ├── Post.php                   # Post
    │   │   └── User.php                   # (Opcional) Model de usuário
    │   │
    │   └── Views/
    │       ├── admin/
    │       │   ├── posts/
    │       │   │   ├── create.php
    │       │   │   ├── edit.php
    │       │   │   └── login.php
    │       │   │
    │       │   ├── dashboard.php
    │       │   ├── login.php
    │       │   └── status.php
    │       │ 
    │       ├── blog/
    │       │   ├── index.php
    │       │   └── ver.php  
    │       │
    │       ├── docs/
    │       │     ├── estrutura.php
    │       │     ├── composer.php
    │       │     ├── virtualhost.php
    │       │     ├── fluxomvc.php
    │       │     ├── caracteristicas.php
    │       │     └── diagrama.php
    │       │  
    │       ├── layouts/
    │       │   ├── main.php               # Layout base
    │       │   ├── header.php             # Cabeçalho
    │       │   └── footer.php             # Rodapé
    │       │ 
    │       ├── 404.php
    │       ├── about.php
    │       ├── blog.php
    │       ├── contact.php
    │       ├── coverage.php
    │       ├── home.php
    │       ├── post.php    
    │       ├── post.sql
    │       └── readme.php
    │       
    ├── config/
    │   └── config.php
    │        
    ├── public/
    │   ├── index.php                   
    │   └── .htaccess  
    │                   
    ├── vendor/
    │   └── autoload.php                  # PSR-4 via Composer
    │
    ├── composer.json
    ├── composer.lock
    └── .env