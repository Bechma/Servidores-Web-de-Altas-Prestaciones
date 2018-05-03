# Trabajo SQL injection SWAP
#### Autor: Bruno Chenoll

## Que es SQLi
SQL injection es uno de los ataques que con más frecuencia se producen actualmente y uno de los más peligros también. Consiste en enviar a través de un campo de entrada de una aplicación web, una query SQL que engañe al programa para cambiar el resultado esperado de la query que se envia a la base de datos.

La OWASP en el último reporte de 2017 sigue considerando este ataque como el más peligroso otro año(lleva mucho tiempo en cabeza).

Aunque es un ataque devastador, evitarlo es relativamente fácil. Tenemos que preocuparnos de escapar todo carácter potencialmente peligroso como puede ser comillas simples('), comillas dobles("), la propia barra de escapar(\\)... entre otros.

Pero... ¿cómo detectar si somos vulnerables? En internet tenemos diversos "cheatsheets" que podemos lanzar a nuestra aplicación para ver si obtenemos o no el resultado que esperamos.

Algunos payloads pueden ser:
- admin' --
- admin' #
- admin'/*
- ' or 1=1--
- ' or 1=1#
- ' or 1=1/*
- ') or '1'='1--
- ') or ('1'='1--

Si algunas de estas sentencias en cualquiera de nuestros campos hace que nos devuelva un resultado válido, podemos decir que somos vulnerables. Por tanto tendremos que tomar las medidas oportunas para defendernos, ya sea escapando caracteres, cambiando el método de comunicación con la base de datos o detectando patrones de ataque.

## Tipos de SQLi

Cuando se detecta esta vulnerabilidad, el atacante se encuentra con diferentes metodologías para sacarle provecho.

1. **Union based**: Consiste en utilizar la sentencia SQL de "UNION ALL SELECT ...." para unir dos tablas y así extraer información de una tabla donde se supone que no debería de extraerse dicha información
2. **Blind SQLi**: Digamos que esta técnica consiste en dar palos de ciego hasta que se encuentra lo que se está buscando, con sentencias del tipo LIKE '%STRING%' o similares. Dentro de esta tipo podemos encontrar:
	1. *Boolean*
	2. *Error based*
	3. *Out of band*
	4. *Time delay*
	5. *Stored Procedure*

Todas estas técnicas al fin y al cabo se basan en ir investigando con diferentes sentencias la base de datos del objetivo y extraer toda la información posible para después venderla, recurrir al chantaje o, simplemente evaluar el daño que podría haberse causado en el caso de un pentester.

## Demostración
En la clase haré una demostración de SQLi *Union based* sobre los archivos php adjuntos en esta carpeta, prueba1.php no es vulnerable(es por donde accedemos a nuestra base de datos con los usuarios) pero prueba2.php es vulnerable y por culpa de ello podremos obtener información sobre los usuarios y contraseñas para poder loguearnos luego en prueba1.php

He añadido adicionalmente un script simple en python que hace un ataque a prueba2.php para sacar el usuario administrador(modificar la url a gusto).

## Conclusiones
Para detectar o realizar un SQLi se requieren altos conocimientos de la base de datos que se esté usando, ya que puede pasar que se detecte una vulnerabilidad pero no se consiga extraer información alguna por desconocimientos de comandos o trucos para saltarse el filtrado. Aparte, es importante saber el lenguaje que se utiliza para enviar consultas, ya que puede que haya alguna vulnerabilidad relacionada con el filtrado o en el propio envio.

Aunque por otro lado, hay herramientas como SQLmap que ayudan a detectar este tipo de ataques por medio de pruebas personalizadas. Haciendo más fácil tanto la tarea del hacker malo, como del bueno.

### Enlaces útiles

[OWAP](https://www.owasp.org/index.php/Testing_for_SQL_Injection_(OTG-INPVAL-005))

[SQL cheatsheet](https://www.netsparker.com/blog/web-security/sql-injection-cheat-sheet/)
