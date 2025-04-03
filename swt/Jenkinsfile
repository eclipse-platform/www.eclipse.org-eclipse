pipeline {
 
  agent {
    kubernetes {
      label 'hugo-agent'
      yaml """
apiVersion: v1
metadata:
  labels:
    run: hugo
  name: hugo-pod
spec:
  containers:
    - name: jnlp
      volumeMounts:
      - mountPath: /home/jenkins/.ssh
        name: volume-known-hosts
      env:
      - name: "HOME"
        value: "/home/jenkins"
    - name: hugo
      image: eclipsecbi/hugo:0.81.0
      command:
      - cat
      tty: true
  volumes:
  - configMap:
      name: known-hosts
    name: volume-known-hosts
"""
    }
  }
 
  environment {
    PROJECT_NAME = "swt" // must be all lowercase.
    PROJECT_BOT_NAME = "SWT Bot" // Capitalize the name
  }
 
  triggers { pollSCM('H/10 * * * *') 
 
 }
 
  options {
    buildDiscarder(logRotator(numToKeepStr: '5'))
    checkoutToSubdirectory('hugo')
  }
 
  stages {
    stage('Checkout www repo') {
      steps {
        dir('www') {
            sshagent(['github-bot-ssh']) {
                sh '''
                    git clone git@github.com:eclipse-platform/www.eclipse.org-${PROJECT_NAME}.git .
                    git checkout ${BRANCH_NAME}
                '''
            }
        }
      }
    }
    stage('Build website (master) with Hugo') {
      when {
        branch 'master'
      }
      steps {
        container('hugo') {
            dir('hugo') {
                sh 'hugo -b https://www.eclipse.org/${PROJECT_NAME}/'
            }
        }
      }
    }
    stage('Build website (staging) with Hugo') {
      when {
        branch 'staging'
      }
      steps {
        container('hugo') {
            dir('hugo') {
                sh 'hugo -b https://staging.eclipse.org/${PROJECT_NAME}/'
            }
        }
      }
    }
    stage('Push to $env.BRANCH_NAME branch') {
      when {
        anyOf {
          branch "master"
          branch "staging"
        }
      }
      steps {
        sh 'rm -rf www/* && cp -Rvf hugo/public/* www/'
        dir('www') {
            sshagent(['github-bot-ssh']) {
                sh '''
                git add -A
                if ! git diff --cached --exit-code; then
                  echo "Changes have been detected, publishing to repo 'www.eclipse.org/${PROJECT_NAME}'"
                  git config --global user.email "releng-bot@eclipse.org"
                  git config --global user.name "Eclipse Releng Bot"
                  git commit -m "Website build ${JOB_NAME}-${BUILD_NUMBER}"
                  git log --graph --abbrev-commit --date=relative -n 5
                  git push origin HEAD:${BRANCH_NAME}
                else
                  echo "No changes have been detected since last build, nothing to publish"
                fi
                '''
            }
        }
      }
    }
  }
}