pipeline {
    agent any
    environment {
        APP_NAME = "laravel-jafar"
    }
    stages {
        stage('1. Checkout Code') {
            steps {
                echo 'Mengambil kode terbaru dari GitHub...'
                checkout scm
            }
        }
         stage('2. Build Docker Image') {
            steps {
                echo 'Membangun Docker Image Laravel...'
                sh 'docker build -t ${APP_NAME}:latest .'
            }
        }
        stage('3. Deploy Ke Port 8000') {
            steps {
                echo 'Menjalankan Container Laravel...'
                sh 'docker stop ${APP_NAME} || true && docker rm ${APP_NAME} || true'
                sh 'docker run -d --name ${APP_NAME} -p 8000:80 ${APP_NAME}:latest'
                echo 'Selesai! Buka di Windows: http://localhost:8000'
            }
        }
    }
}

