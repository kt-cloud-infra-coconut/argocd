# 시도해볼 것
- scrapeConfigNameSelector: {} 네임스페이스 지정해서 정보수집
-> 네임스페이스들한테 같은 이름의 labels 부착해서 {변수}에 넣기
라벨 부착 후 {ServiceMonitor,PodMonitor}.yml 작성해서 클러스터에 apply 해줘야함

- 그라파나, 프로메테우스 svc 를 values.yml에서 nodeport/lb/ingress로 변경

- secret 으로 adminpassword 대체
  prometheus 설치할 joo ns 에 secret(create secret generic grafana-pw --from-literal=admin-user=admin --from-literal=admin-password=test123 -n joo) 로 만들어야함


- slack 연동해서 알림설정, slack bot으로 kubectl 명령 전달
  secret 으로 webhook url 대체


-----
# 내 로컬에서 해볼 것

git pull https://github.com/prometheus-community/helm-charts/tree/main/charts/kube-prometheus-stack.git



k label namespace test1 test=123
k get namespace test1 --show-labels
