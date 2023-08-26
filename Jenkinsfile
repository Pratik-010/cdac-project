pipeline {
    agent any
    tools {
        git 'Default'
        
    }
    environment {
        SCANNER_HOME=tool 'sonar-scanner'
        
    }

    stages {
        stage('GitHub clone Report') {
            steps {
                git branch: 'main', changelog: false, poll: false, url: 'https://github.com/Pratik-010/cdac-project.git'
            }
        }
        
        stage('Sonarqube Analysis') {
            steps {
                sh '''
                $SCANNER_HOME/bin/sonar-scanner -Dsonar.url=http://192.168.49.1:9000/ -Dsonar.login=squ_6efc1f9f9f287a30339b251ac42c08c7e2bb2f19 -Dsonar.projectName=project-pipeline \
                -Dsonar.java.binaries=. \
                -Dsonar.projectKey=project-pipeline '''
            }
        }
        stage ('Quality-Report-Check..?') {
            steps {
                input 'Have You Checked The Report, And Do You Want To Continue...?'
            }
        }

        stage('Docker Build') {
            steps {
                sh 'docker image rm --force pratiek10/project-pipeline'
                sh '/usr/bin/docker image build -t pratiek10/project-pipeline .'
            }
        }
        stage ('docker login') {
            steps {
                sh 'echo dckr_pat_RhqQhlhQYyAVAyoaMljw2a4rDkg | /usr/bin/docker login -u pratiek10 --password-stdin'
            }
        }
        stage('TRIVY Scanner And Generate-Report') {
            steps {
                sh 'trivy image pratiek10/project-pipeline --quiet --format=table'
                sh 'trivy image -f json -o results.json pratiek10/project-pipeline'
            }
        }
        stage ('Trivy-Vulnerability-Report-Check..?') {
            steps {
                input 'Have You Checked The Report, And Do You Want To Continue...?'
            }
        }
        stage ('docker image push') {
            steps {
                sh '/usr/bin/docker image push pratiek10/project-pipeline'
            }
        }
                stage('Docker Container-Deploy') {
            steps {
                sh 'docker container rm --force project1'
                sh 'docker run -d -p 4301:80 --name project1 pratiek10/project-pipeline'
            }
        }
    }
}

