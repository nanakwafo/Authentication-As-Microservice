
## Architectural Diagrams

![alt text](https://github.com/nanakwafo/authmicroservice/blob/master/images/icon1.png "Logo Title Text 1")

## Database Diagrams

![alt text](https://github.com/nanakwafo/authmicroservice/blob/master/images/icon3.png "Logo Title Text 1")

## Api Documentation
Documentation for this can be found on the [Auth as a microservice](https://documenter.getpostman.com/view/1213803/SzKPWhH9?version=latest)

## Setup Instruction

1. Install Docker your environment.
1. Clone project files in your working directory
1. cd into the project such that you are in the root directory of the dockerfile on terminal
1. execute this on the terminal
  ` docker-compose build && docker-compose up -d`

NB.This will spin up 3 containers



#Run the app using docker compose
` docker-compose build && docker-compose up -d`
#Run the app using docker stack
`docker stack deploy -c docker-stack.yml authservice`
`docker stack ls`