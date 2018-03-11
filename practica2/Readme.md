# Práctica 2
[chown]: https://raw.githubusercontent.com/Bechma/Servidores-Web-de-Altas-Prestaciones/master/practica2/chown.png 
[crontab]: https://raw.githubusercontent.com/Bechma/Servidores-Web-de-Altas-Prestaciones/master/practica2/crontab.png 
[rsync]: https://raw.githubusercontent.com/Bechma/Servidores-Web-de-Altas-Prestaciones/master/practica2/rsync.png 
[ssh_nopass]: https://raw.githubusercontent.com/Bechma/Servidores-Web-de-Altas-Prestaciones/master/practica2/ssh_nopass.png 

Para realizar la práctica 2, he utilizado 2 máquinas virtuales, una que será la primaria(192.168.56.11) y otra secundaria(192.168.56.12).

### 1. Crear un tar con ficheros locales en un equipo remoto
Para realizar este punto he copiado y pegado el comando que aparecía en el pdf con la explicación.
```bash
tar czf - ~ | ssh bruno@192.168.56.11 'cat > ~/tar.tgz'
```
La carpeta home de mi máquina secundaria se ha comprimido y copiado en *tar.tgz*, este archivo no ha llegado a almacenarse en la máquina ya que la salida de la orden se ha transferido automáticamente por ssh a la máquina principal

### 2. Instalar la herramienta rsync
Primero he realizado el cambio de propietario de la carpeta /var/www en ambas máquinas para mayor facilidad con la orden 
```bash
chown -R bruno:bruno /var/www
```
![alt text][chown]

Una vez hecho esto, he modificado un poco la carpeta /var/www de la máquina principal para añadirle un fichero extra en la carpeta html y una carpeta con un archivo que debe ser ignorado por la orden rsync.

![alt text][rsync]

Se puede ver que funciona correctamente.

### 3. Acceso sin contraseña para ssh
Al usar este comando desde la máquina secundaria, dejando como se dice en el guión la passwords que me pide en blanco
```bash
ssh-keygen -b 4096 -t rsa && ssh-copy-id bruno@192.168.56.11
```
Me permite conectarme sin pedirme contraseña:
![alt text][ssh_nopass]

### 4. Programar tareas con crontab
Para esto, he ejecutado la orden en la máquina secundaria
```bash
crontab -e 
```
He seleccionado nano como editor preferido para la modificación y he puesto lo que se ve en la siguiente imagen 
![alt text][crontab]
