
--accesos--
SELECT op.nombre as nombre , gr.grupo as grupo FROM accesos acc INNER JOIN grupos gr ON acc.id_grupo=gr.id INNER JOIN opciones op ON op.id=acc.id_opcion WHERE op.id_grupo=gr.id and acc.id_grupo= gr.id ORDER by gr.id


SELECT id_grupo,id_opcion, (SELECT grupo FROM grupos WHERE id=accesos.id_grupo ) AS grupo, (SELECT nombre FROM opciones WHERE id=accesos.id_opcion) AS nombre FROM accesos ORDER BY accesos.id



SELECT (SELECT grupo FROM grupos WHERE id_grupo=grupos.id ) AS grupo ,nombre,op_url FROM opciones ORDER BY id


SELECT gr.grupo as grupo  FROM accesos acc INNER JOIN grupos ON gr.id=acc.id_grupo INNER JOIN opciones op ON acc.id_opcion=op.id WHERE op.id_grupo=acc.id_grupo AND gr.id=acc.id_grupo AND op.id_grupo=gr.id ORDER BY gr,id

----------------------------------------------------------------
SELECT gr.grupo as grupo, op.op_url as op_url, op.nombre as nombre FROM accesos acc INNER JOIN grupos gr ON gr.id=acc.id_grupo INNER JOIN opciones op ON acc.id_opcion=op.id WHERE op.id_grupo=acc.id_grupo AND gr.id=acc.id_grupo AND op.id_grupo=gr.id ORDER BY gr.id


----------------------------------------------------------------

SELECT gr.grupo as grupo FROM opciones op INNER JOIN grupos gr ON gr.id=op.id_grupo WHERE op.id_grupo=gr.id AND op.estado=1 AND op.mostrar='si'


---2021/0/16----------------------------------------------------
SELECT icono , grupo FROM grupos WHERE estado=1

SELECT  gr.grupo as grupo , op.op_url as op_url, op.nombre as nombre FROM opciones op INNER JOIN grupos gr ON gr.id=op.id_grupo WHERE  op.id_grupo=gr.id AND  op.mostrar='si' ORDER BY gr.id
------------funcioa opciones----
SELECT   gr.grupo , op.op_url as op_url ,op.nombre as nombre  FROM opciones op INNER JOIN accesos acc ON acc.id_opcion=op.id INNER JOIN grupos gr ON gr.id=op.id_grupo WHERE op.id_grupo=gr.id AND acc.id_opcion=op.id ORDER BY gr.id ASC

----


SELECT * FROM configuration;
SELECT * /*ESTO ES UN COMENTARIO*/ FROM configuration;
SELECT * /*ESTO ES UN COMENTARIO FROM configuracion*/ FROM user;
SELECT * FROM user -- * FROM configuration;

 select * from user where ( correo="admin" or usuario="admin" )and clave='adcd7048512e64b48a55b027577886ee5a36350' and operativo=1

 select * from user where ( correo="admin"); -- or usuario='admin' and clave='adcd7048512e64b48a55b027577886ee5a36350' and operativo=1


select * from user where (nom_usuario='admin'); --" or usuarios ="admin"; --") and clave ='adcd7048512e64b48a55b027577886ee5a36350'

SELECT * FROM usuarios WHERE =''OR '1'='1'AND clave=''OR '1'='1'

mysql_real_escape_string




SELECT * FROM configuration;
SELECT * /*ESTO ES UN COMENTARIO*/ FROM configuration;
SELECT * /*ESTO ES UN COMENTARIO FROM configuracion*/ FROM user;
SELECT * FROM user -- * FROM configuration;

 select * from user where ( correo="admin" or usuario="admin" )and clave='adcd7048512e64b48a55b027577886ee5a36350' and operativo=1

 select * from user where ( correo="admin"); -- or usuario='admin' and clave='adcd7048512e64b48a55b027577886ee5a36350' and operativo=1


select * from user where (nom_usuario='admin'); --" or usuarios ="admin"; --") and clave ='adcd7048512e64b48a55b027577886ee5a36350'

SELECT * FROM usuarios WHERE =''OR '1'='1'AND clave=''OR '1'='1'

mysql_real_escape_string

admin"); -- 
"or 1=1); -- 

<script>
setInterval(function(){alert("hacked")},1000</script>

'or '1'='1