from urllib import request, parse
from json import dumps
from sys import argv
URL = "https://fcm.googleapis.com/fcm/send"
if len(argv) == 0:
    print("Something bad happened")
    exit(1)

data = dumps({"to": argv[1]})

with open("authKey.txt", "r") as f:
    key = list(f)[0].strip()

headers = {"Authorization": "key=" + key, "Content-Type": "application/json"}

rq = request.Request(URL, data=data.encode("ASCII"), headers=headers)
print(rq.header_items())

response = request.urlopen(rq)
print(response.read())
