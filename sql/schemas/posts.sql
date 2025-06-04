create table posts (
    id int auto_increment primary key,
    titulo varchar(255) not null,
    slug varchar(255) not null,
    conteudo text not null,
    autor varchar(100) null,
    criado_em datetime default CURRENT_TIMESTAMP null,
    atualizado_em datetime default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    constraint slug unique (slug)
);