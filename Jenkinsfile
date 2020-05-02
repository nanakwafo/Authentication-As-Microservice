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
                withCredentials([sshUserPrivateKey(credentialsId: 'testing', keyFileVariable: 'private_key',passphraseVariable:'',usernameVariable: 'ubuntu')]) {
                  echo "$private_key"
                    }
           
            }
        }
    }
}
