pipeline {
    agent any
    
    stages {
        stage('Build') {
            steps {
                // Aquí van los comandos para compilar tu proyecto
                echo 'Compilando el proyecto...'
                echo ' este es un nuevo mensaje2 ######################################################################### pull'
            }
        }
        stage('Test') {
            steps {
                // Aquí van los comandos para ejecutar pruebas
                echo 'Ejecutando pruebas...'
            }
        }
        stage('Deploy') {
            steps {
                // Aquí van los comandos para implementar tu aplicación
                echo 'Implementando la aplicación...'
            }
        }
    }
    
    post {
        success {
            // Aquí van las acciones a realizar si el pipeline tiene éxito
            echo 'El pipeline se ejecutó con éxito.'
        }
        failure {
            // Aquí van las acciones a realizar si el pipeline falla
            echo 'El pipeline falló.'
        }
        always {
            // Aquí van las acciones que se ejecutarán siempre, independientemente del resultado del pipeline
            echo 'Este bloque siempre se ejecuta.'
        }
    }
}
