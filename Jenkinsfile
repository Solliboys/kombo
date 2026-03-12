pipeline {
    agent any
    environment {
        APP_NAME = "laravel-jafar"
        // Kita siapkan variabel rahasia di sini
        APP_ENV = "production"
        APP_DEBUG = "false"
        DB_CONNECTION = "sqlite"
    }
    stages {
        stage('1. Checkout') {
            steps {
                checkout scm
            }
        }
        stage('2. Build') {
            steps {
                sh 'docker build -t ${APP_NAME}:latest .'
            }
        }
        stage('3. Deploy') {
            steps {
                echo 'Menghapus container lama jika ada...'
                sh 'docker stop ${APP_NAME} || true && docker rm ${APP_NAME} || true'

                echo 'Menjalankan container baru dengan Environment Variables...'
                // Perhatikan flag -e di bawah ini, ini cara kita menyuntikkan variabel rahasia!
                sh '''
                docker run -d --name ${APP_NAME}                   --network jenkins                   -p 8000:80                   -e APP_ENV=${APP_ENV}                   -e APP_DEBUG=${APP_DEBUG}                   -e DB_CONNECTION=${DB_CONNECTION}                   ${APP_NAME}:latest
                '''
            }
        }
    }
}
