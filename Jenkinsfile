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
                sh 'cd dist'
                sh 'ls'
               // withCredentials([credentialsId:])
            }
        }
    }
}
