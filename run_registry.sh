#Configuración servicio Docker Resgitry

docker service create \
  --limit-cpu 1  \
  --limit-memory 512MB \
  --name registry \
  --secret myregistry.tfg.com.crt \
  --secret myregistry.tfg.com.key \
  --constraint 'node.role!=manager' \
  --mount type=volume,source=registry,target=/var/lib/registry \
  -e REGISTRY_HTTP_ADDR=0.0.0.0:443 \
  -e REGISTRY_HTTP_TLS_CERTIFICATE=/run/secrets/myregistry.tfg.com.crt \
  -e REGISTRY_HTTP_TLS_KEY=/run/secrets/myregistry.tfg.com.key \
  --publish published=443,target=443 \
  --replicas 1 \
  registry:2 
