pipeline {
    agent any
            stages {

                    stage('staging') {

                            when {
                              branch 'master'
                            }
                            steps{

                                      sshPublisher(
                                         failOnError: true,
                                         continueOnError: false,
                                         publishers: [
                                            sshPublisherDesc(
                                                 configName: 'staging',
                                                 verbose: true,
                                                 transfers: [
                                                     sshTransfer(
                                                           sourceFiles: '**/*',
                                                           remoteDirectory: '/authenticationservice',
                                                           execCommand: 'echo "success"'
                                                           )
                                                  ]
                                            )
                                        ]
                                    )
//                                    sshagent(['staging']) {
//                                           sh """ssh -o StrictHostKeyChecking=no ubuntu@3.16.196.105 << EOF
//                                         cd authenticationservice/docker-compose-deployment/
//                                         docker-compose build
//                                         docker-compose up -d
//                                         exit
//                                         EOF"""
//                                     }

                            }
                    }
            }

        }
}
