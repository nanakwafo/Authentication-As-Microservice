pipeline
 {
    agent any
        stages {

            stage('staging') {

                 when {
                       branch 'master'
                      }
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
                                               execCommand : 'echo "success"'
                                               )
                                     ]
                                )
                             ]
                          )
                      }
             }
        }

     }
 }
