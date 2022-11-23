# ratica efetuada
ClusterIP é um servico que forcene ip interno ao pod
Nodeport é um servico que forcene ip interno/externo ao pode 
Criando pods -- pasta pod "Pods normalmente são criados através de Deployments, e não individualmente. "
"Criar pods com o arquivo de Deployments" Versionamento

# Persistencia 
Orden de criação no gcp
criar disco 
# Storage Class não é diretamente um PV, nós vamos conseguir criar o disco e o Persistent Volume dinamicamente, conforme a necessidade

Ordem de criação
persistencia/storage classes/sc.yml
persistencia/storage classes/pvc-sc.yml
persistencia/storage classes/pod-sc.yml

# Statefulset precisa do pv e pvc "Porem ele cria o pv automaticamente"
Clusters possuem StorageClasses "default" e podem ser usados automaticamente se não definirmos qual será utilizado

Ordem de criação
persistencia/statefulSet/imagens-pvc.yml
persistencia/statefulSet/sessao-pvc.yml
persistencia/statefulSet/app-statefulser.yml

# Probes 
Tornar visível ao Kubernetes que uma aplicação não está se comportando da maneira esperada
Podemos criar critérios para definir se a aplicação está saudável através de probes

# Liveness
-Prova de vida que ação dentro de um container de um pod esta funcionando
LivenessProbes podem fazer a verificação em diferentes intervalos de tempo via HTTP

# Readiness Probes
- Maneira de garantir quando o pod apos uma falha estara pronto para subir
ReadinessProbes podem fazer a verificação em diferentes intervalos de tempo via HTTP

LivenessProbes são para saber se a aplicação está saudável e/ou se deve ser reiniciada, enquanto ReadinessProbes são para saber se a aplicação já está pronta para receber requisições depois de iniciar
Além do HTTP, também podemos fazer verificações via TCP

# Escalando pods automaticamente
# Horizontal Pod Autoscaler

é um recurso capaz de, automaticamente, escalar o número de Pods em um Deployment, em um ReplicaSet, em um StatefulSet, baseado na observação da CPU.

Baseado no consumo de CPU vamos aumentar ou diminuir para suprir essa demanda, o número de Pods.

# Servidor de metricas

no windows
escalonamento/servidor de metricas/components.yaml
- Adicionado na linha 89 flag

no linux
>_ minikube addons enable metrics-server

e no arquivo stress.sh alterar localhos para o ip do node
>_ kubectl get nodes -o wide
>_ bash stress.sh 0.001 > out.txt

# Teste de stresse

executar no gitbash 

escalonamento/teste de cpu/stess.sh