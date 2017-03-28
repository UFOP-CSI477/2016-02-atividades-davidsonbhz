 select g.grupo,g.nomegrupo,u.usuario,u.nome from grupo g inner join usuarioxgrupo ug on ug.grupo=g.grupo inner join usuario u on ug.usuario=u.usuario and ug.usuario=48;
