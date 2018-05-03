# Práctica 4 SWAP

### Certificado autofirmado

Aquí prácticamente es seguir los pasos que aparecen en el guión, lo único remarcable es el traspaso del certificado de la máquina principal a la máquina secundaria. 

Para hacer la copia entre máquinas correctamente habría que habilitar el acceso por ssh a root desde una máquina a otra(cosa bastante peligrosa) y hacer rsync de los certificados de /etc/apache2/ssl

Al final opté por copiar por sftp los certificados de la principal a la secundaria.

### Cortafuegos con IPTABLES

Para esta parte en vez de seguir el guión, he optado por hacer directamente la parte opcional de montar un nginx que despache http y https.
He seguido las instrucciones que hay en [esta pagina](https://www.digitalocean.com/community/tutorials/how-to-set-up-an-iptables-firewall-to-protect-traffic-between-your-servers)

Tras seguir los pasos, lo único que hay que modificar es que en vez de hacer:

```bash
	sudo service iptables-persistent start
```

Hay que sustituir el comando por:

```bash
	sudo service netfilter-persistent start
```

Y con hacer peticiones a nuestro nginx podrá servir tanto si le hacemos peticiones por http como por https.
