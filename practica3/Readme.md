# Práctica 3. Balanceador de carga
### 1. Configurar una máquina e instalar el nginx como balanceador de carga
Para crear la nueva máquina, he optado por clonar una de las que ya tenía y modificar la interfaz de red de ésta para asignarle otra ip fija. Así no habrá colisiones con las demás máquinas y tendré asegurada la ip del balanceador. También desinstalo apache2, ya que necesitaré libre el puerto 80 para nginx.

Para instalar y habilitar nginx con las ordenes:
```bash
    apt install nginx
    systemctl enable nginx
```
Creo el archivo "/etc/nginx/conf.d/default.conf" con la configuración que aparece en el guión con las IPs correctas de mis máquinas(no lo pego por no saturar la documentación con información un tanto redundante). Antes de poder arrancar nginx hay que comentar en "/etc/nginx/nginx.conf" la línea "include /etc/nginx/sites-enabled/*"

Por último arranco nginx con 
```bash 
sudo systemctl start nginx
```
![alt text](https://raw.githubusercontent.com/Bechma/Servidores-Web-de-Altas-Prestaciones/master/practica3/nginx.png)

### 2. Configurar una máquina e instalar el haproxy como balanceador de carga
Para instalar y configurar Haproxy he hecho prácticamente lo mismo que con Nginx.
1. Clonar una máquina, cambiar su dirección IP y desinstalar apache2
2. Instalar Haproxy con apt install haproxy
3. Dejar la configuración de /etc/haproxy/haproxy.cfg como aparece en el guión pero con las IPs de mis servidores
4. Ejecutar "haproxy -f /etc/haproxy/haproxy.cfg"

![alt text](https://raw.githubusercontent.com/Bechma/Servidores-Web-de-Altas-Prestaciones/master/practica3/haproxy.png)

### 3. Someter a la granja web a una alta carga, generada con la herramienta Apache Benchmark, teniendo primero nginx y después haproxy.
Para realizar la prueba he usado la order del guión de 1000 peticiones con concurrencia 10 a ambos balanceadores, el resultado ha sido prácticamente idéntico.
ab -n 1000 -c 10 http://192.168.56.20/
ab -n 1000 -c 10 http://192.168.56.21/
![alt text](https://raw.githubusercontent.com/Bechma/Servidores-Web-de-Altas-Prestaciones/master/practica3/benchmarking.png)
