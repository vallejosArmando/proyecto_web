

select p.nombres as nombre ,us.nom_usuario as uusario from usuarios us INNER JOIN personas p ON us.id_persona=p.id WHERE us.estado=1