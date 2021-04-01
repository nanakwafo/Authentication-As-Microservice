
## Architectural Diagrams



![alt text](https://github.com/nanakwafo/authmicroservice/blob/master/authentication-design/images/icon1.png "Logo Title Text 1")

## Database Diagrams

![alt text](https://github.com/nanakwafo/authmicroservice/blob/master/authentication-design/images/icon3.png "Logo Title Text 1")

## Api Documentation
Documentation for this can be found on the [Auth as a microservice](https://documenter.getpostman.com/view/1213803/SzKPWhH9?version=latest)

## Setup/Run Instruction

#Run the app using docker compose
`docker-compose build && docker-compose up -d`&
#Run the app using docker stack
`docker stack deploy -c docker-stack.yml authservice`&
`docker stack ls`&
#Run the app using kubernetes
`Copy the current src content into the src folder in the kubernetes-deployment directory`&
`kubectl apply -f authentication-configmap.yml `&
`kubectl apply -f authentication-pod.yml `&
`kubectl apply -f authentication-service.yml `&
