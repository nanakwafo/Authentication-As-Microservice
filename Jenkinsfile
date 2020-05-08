pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                echo 'Running build automation'
                sh 'ls -la'
              
                
            }
        }
        stage('DeployToStaging') {
            when {
              branch 'master'
            }
            steps{
                //withCredentials([sshUserPrivateKey(credentialsId: 'testing', keyFileVariable: 'private_key',passphraseVariable:'',usernameVariable: 'ubuntu')]) {
                       
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
                                          execCommand: 'sudo ls -la && sudo sh -c  "sudo cd authenticationservice/docker-compose-deployment" && sudo docker-compose build'
					     	
                                      )	
                                  ]	
                             )	
                         ]	
                     )
                      
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
