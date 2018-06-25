CREATE SCHEMA hifreela;
USE hifreela;

CREATE TABLE usuarios(
	idusuarios INT PRIMARY KEY not null auto_increment,
	nome varchar(45) not null,
	endereco varchar(45) not null,
    cidade varchar(45) not null,
    estado varchar(2) not null,
    email varchar(30) not null,
    senha varchar(15) not null
);

CREATE TABLE trabalhadores(
	idtrabalhadores INT PRIMARY KEY not null auto_increment,
	matricula int not null,
    profissao varchar(45) not null,
	tempo varchar(45) not null,
    periodo varchar(45) not null,
    fk_idusuarios int,
    foreign key (fk_idusuarios) references usuarios(idusuarios) 
);

create table clientes(
	idclientes int primary key not null auto_increment,
    matricula int not null,
    avaliacao int not null,
    fk_idusuarios int,
    foreign key (fk_idusuarios) references usuarios(idusuarios)
    );
    
create table contratos(
	idcontratos int primary key not null auto_increment,
    valor decimal(4,2) not null,
    datainicio date not null,
    datafim date,
    concluido boolean,
    fk_idtrabalhadores int,
    fk_idclientes int,
    fk_comentarios int,
    foreign key (fk_idtrabalhadores) references trabalhadores(idtrabalhadores),
    foreign key (fk_idclientes) references clientes(idclientes),
    foreign key (fk_comentarios) references comentarios(idcomentarios)
    );
create table comentarios(
	idcomentarios int primary key not null auto_increment,
    comentario text(240),
    avaliacao int,
    fk_idusuarios int,
    foreign key (fk_idusuarios) references usuarios(idusuarios)
);

create table pagamentos(
	idpagamentos int primary key not null auto_increment,
    tipo varchar(12) not null,
    statuspag boolean not null,
    fk_contrato int,
    foreign key (fk_contrato) references contratos(idcontrato)
    );