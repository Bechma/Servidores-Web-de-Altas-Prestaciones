# Práctica 5. Replicación de bases de datos MySQL

La realización de esta práctica no ha tenido mayor complicación que leer y seguir el guión. Opté por hacer directamente hacer la parte opcional de montar una base de datos entre el servidor principal y el de backup maestro-maestro. Para ello hice la configuración paralelamente en ambas máquinas.

En el desarrollo me surgieron un par de dudas del desarrollo de maestro-maestro, por lo que extraje un poco de información de [esta página](https://www.linode.com/docs/databases/mysql/configure-master-master-mysql-database-replication/) donde explica una forma muy similar de configurar un maestro-maestro. Sólo destacar de esta parte que para aumentar la seguridad, al usuario esclavo creado en ambas máquinas sólo se le da el permiso de replicación si viene desde la otra máquina(en caso que alguien consiga la contraseña del esclavo, no podrá replicar la base de datos).

Por último, como trabajo con virtual box y las 2 máquinas las obtuve duplicando una de ellas, tuve un problema con el server "__uuid", [en esta página explica cómo solucionar el problema](https://blog.csdn.net/leshami/article/details/43854505), está en chino, pero es básicamente borrar el archivo que hay en "/var/lib/mysql/auto.cnf", reiniciar mysql y ya nos desaparecería ese problema.
