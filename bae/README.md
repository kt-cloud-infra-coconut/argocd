-----------------------------------------------------------
HPA 설치
-----------------------------------------------------------
Metrics Server 설치

kubectl apply -f https://github.com/kubernetes-sigs/metrics-server/releases/latest/download/components.yaml

Metrics Server는 쿠버네티스에서 리소스 기반 오토스케일링(HPA, VPA)을 위해 노드·파드 리소스 사용량을 전담해서 제공하는 메트릭 서버 역할을 한다.

metric-server 상태 확인
kubectl get deployment metrics-server -n kube-system
kubectl get pods -n kube-system | grep metrics-server

-----------------------------------------------------------
HPA yaml파일 작성
-----------------------------------------------------------
HPA가 작동하기 전에 노드가 Ready 상태인지 확인한다.
kubectl get nodes

현재 클러스터에서 실시간으로 리소스를 얼마나 사용하고 있는지 확인
kubectl top node
kubectl top pod -A


-----------------------------------------------------------
HPA 내용 설명
-----------------------------------------------------------
HPA.yaml 파일은 에디트, 로그인, 회원가입 서비스와 배포파일과 연동하여 HPA 파일 작성되어있다.
HPA는 CPU와 메모리의 사용량을 모니터링하여 리소스가 50%를 넘는다면 레플리카를 하나씩 늘리게 된다(최대 10개의 레플리카).
kubectl get hpa -n ingress-myweb
namespace를 확인해야 hpa가 작동하는지 확인된다.