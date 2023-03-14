# Despliegue de servicios en contenedores Docker orquestados con Docker Swarm  


# Ejecutar el script run_registry.sh, para lanzar el servicio que despliega el repositorio privado:  
`./run_registry.sh`


# Ejecutar el siguiente comando para desplegar la pila LAMP en Docker Swarm indicando el nombre del stack:  
`docker stack deploy --compose-file docker-compose.yml <nombre-del-stack>`


# Ejecutar el siguiente comando para detener la pila LAMP:  
`docker stack rm <nombre-del-stack>`


