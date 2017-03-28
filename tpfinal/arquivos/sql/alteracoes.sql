create table usuarioxturma(usuario integer not null,turma integer not null, 
foreign key (usuario) references usuario(usuario), 
foreign key (turma) references turma(turma));

alter table turma add created_at timestamp not null DEFAULT CURRENT_TIMESTAMP;
alter table turma add updated_at timestamp not null DEFAULT CURRENT_TIMESTAMP;

alter table candidato drop foreign key fk_candidato_processoseletivo1;
alter table candidato drop processoseletivo;

alter table candidato add remember_token varchar(100) after enviado;
alter table candidato drop enviado;

create table candidatoxprocesso(candidato integer not null, processoseletivo integer not null, 
foreign key(candidato) references candidato(candidato), 
foreign key(processoseletivo) references processoseletivo(processoseletivo));


create table usuarioxdisciplina(usuario integer not null,disciplina integer not null, 
foreign key (usuario) references usuario(usuario), 
foreign key (disciplina) references disciplina(disciplina));

alter table candidato add created_at timestamp not null DEFAULT CURRENT_TIMESTAMP;
alter table candidato add updated_at timestamp not null DEFAULT CURRENT_TIMESTAMP;
