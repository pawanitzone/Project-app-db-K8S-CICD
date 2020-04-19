pipeline {
  agent any
  stages {
    stage('Docker Build') {
      steps {
        sh "docker build -t pawanitzone/myapp:${env.BUILD_NUMBER} ."
      }
    }
    stage('Docker Push') {
      steps {
        withCredentials([usernamePassword(credentialsId: 'dockerHubUser', passwordVariable: 'dockerHubPassword', usernameVariable: 'dockerHubUser')]) {
          sh "docker login -u ${env.dockerHubUser} -p ${env.dockerHubPassword}"
          sh "docker push pawanitzone/myapp:${env.BUILD_NUMBER}"
        }
      }
    }
    stage('Docker Remove Image') {
      steps {
        sh "docker rmi pawanitzone/myapp:${env.BUILD_NUMBER}"
      }
    }
    stage('Apply Kubernetes Files') {
      steps {
          withKubeConfig([default-credentialsId: 'default-credentialsId', 
	  serverUrl: 'https://192.168.99.100:8443']) {
          sh 'cat app.yml | sed "s/{{BUILD_NUMBER}}/$BUILD_NUMBER/g" |kubectl apply -f -'
          sh 'kubectl apply -f app-service.yml'
        }
      }
  }
}
}


