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
          withKubeConfig([credentialsId: 'credentialsId', 
	  serverUrl: 'https://34.70.93.191']) {
          sh 'kubectl get all -n web'
          sh 'cat app.yml | sed "s/{{BUILD_NUMBER}}/$BUILD_NUMBER/g" |kubectl apply -n web -f  -'
          sh 'kubectl apply -n web -f app-service.yml '
        }
      }
  }
}
}


