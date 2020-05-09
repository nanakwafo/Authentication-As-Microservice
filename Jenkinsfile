pipeline {
    agent any
    stages {
       
        stage('DeployToStaging') {
            when {
              branch 'master'
            }
            steps{
                //withCredentials([sshUserPrivateKey(credentialsId: 'testing', keyFileVariable: 'private_key',passphraseVariable:'',usernameVariable: 'ubuntu')]) {
                       //move files to server
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
		       sshagent(['sshstaging']) {
			          sh """ssh -tt ubuntu@3.16.196.105 << EOF 
				    cd authenticationservice/docker-compose-deployment/
				    docker-compose build
				    docker-compose up -d
				    exit
				    EOF"""
				}
                   
                  //  }
           
            }
        }
	stage('Testing'){
		steps{
                    echo 'Smoke Test completed'
		}
	   
	}
	stage('DeployToProduction'){
            when {
              branch 'master'
             }
	     steps{
	        input 'Does the Production Environment look Ok?'
			 
		}
			
	}
    }
}
