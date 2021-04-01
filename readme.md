
## Architectural Diagrams



![alt text](https://github.com/nanakwafo/authmicroservice/blob/master/authentication-design/images/icon1.png "Logo Title Text 1")

## Database Diagrams

![alt text](https://github.com/nanakwafo/authmicroservice/blob/master/authentication-design/images/icon3.png "Logo Title Text 1")

## Api Documentation
Documentation for this can be found on the [Auth as a microservice](https://documenter.getpostman.com/view/1213803/SzKPWhH9?version=latest)

## Setup/Run Instruction

1.Ensure Docker is running successfully on machine using the following command <br />
`docker --version`&<br />
2.Run the app using docker compose <br />
`docker-compose build && docker-compose up -d`&<br />
3.Run the app using docker stack<br />
`docker stack deploy -c docker-stack.yml authservice`&<br />
`docker stack ls`&<br />
4.Run the app using kubernetes<br />
`Copy the current src content into the src folder in the kubernetes-deployment directory`&<br />
`kubectl apply -f authentication-configmap.yml `&<br />
`kubectl apply -f authentication-pod.yml `&<br />
`kubectl apply -f authentication-service.yml `&<br />
