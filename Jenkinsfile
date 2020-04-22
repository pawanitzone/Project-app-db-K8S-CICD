pipeline {
  agent any
    environment {
        PROJECT_ID = 'essential-smoke-274903'
        LOCATION = 'us-central1-c'
        CREDENTIALS_ID = 'gkeweb'
        CLUSTER_NAME = 'hirelab'
                  
    }
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
    
    
    stage('Deploy to GKE') {
       steps{  
	  step([$class: 'KubernetesEngineBuilder', projectId: env.PROJECT_ID, clusterName: env.CLUSTER_NAME, location: env.LOCATION, manifestPattern: 'app-service.yml', credentialsId: env.CREDENTIALS_ID, verifyDeployments: true])
	       
		  sh "sed -i 's/myapp/myapp:${env.BUILD_ID}/g' app.yml"
		  step([$class: 'KubernetesEngineBuilder', projectId: env.PROJECT_ID, clusterName: env.CLUSTER_NAME, location: env.LOCATION, manifestPattern: 'app.yml', credentialsId: env.CREDENTIALS_ID, verifyDeployments: true])
       }
      }
  }
}



