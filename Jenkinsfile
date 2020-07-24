pipeline{
    agent any
        stages {

            stage('staging') {

                 steps
                     {

                          sshPublisher(
                             failOnError : true,
                             continueOnError : false,
                             publishers : [
                                sshPublisherDesc(
                                     configName : 'staging',
                                     verbose : true,
                                     transfers : [
                                         sshTransfer(
                                               sourceFiles : '**/*',
                                               remoteDirectory : '/authenticationservice',
                                              //for the first time ->  execCommand : 'cd /home/ubuntu/authenticationservice/docker-compose-deployment && docker-compose build && docker-compose up -d'
                                               )
                                     ]
                                )
                             ]
                          )

                 }
        }

     }

 }
