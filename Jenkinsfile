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
    
     stage ('Deploy_Argocd') {
             steps {
                     withCredentials([string(credentialsId: "argocd-deploy-role", variable: 'ARGOCD_AUTH_TOKEN')]) {
                        sh "sed -i 's/myapp/myapp:${env.BUILD_ID}/g' app.yml"
                        sh '''
                        ARGOCD_SERVER="34.68.61.3"
                        APP_NAME="myapp"
    
                        # Deploy to ArgoCD
                        ARGOCD_SERVER=$ARGOCD_SERVER argocd --grpc-web app sync $APP_NAME --force
                        ARGOCD_SERVER=$ARGOCD_SERVER argocd --grpc-web app wait $APP_NAME --timeout 600
                        '''
               }
            }

  }
}
}



