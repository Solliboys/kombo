pipeline {
    agent any
    environment {
        APP_NAME = "laravel-jafar"
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

                echo 'Menjalankan container baru di Port 8000...'
                // Jalankan di background (-d) dan sambungkan ke network jenkins 
                // agar koneksi database mysql (laravel_db) aman
                sh 'docker run -d --name ${APP_NAME} --network jenkins -p 8000:80 ${APP_NAME}:latest'
            }
        }
    }
}

