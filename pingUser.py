from urllib import request, parse
from sys import argv
from json import dumps
URL = "https://fcm.googleapis.com/fcm/send"
if len(argv) == 0:
    print("Something bad happened")
    exit(1)

with open("authKey.txt", "r") as f:
    key = list(f)[0].strip()

# data = dumps({"to": argv[1]})

data = dumps({"to": argv[1], "notification": {"title": "Οι Ιουδαει"}})


headers = {"Authorization": "key=" + key, "Content-Type": "application/json"}

rq = request.Request(URL, data=data.encode("UTF-8"), headers=headers)
print(rq.header_items())

response = request.urlopen(rq)
print(response.read())

