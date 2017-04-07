# from urllib import request, parse
# from json import dumps
# URL = "https://fcm.googleapis.com/fcm/send"
# if len(argv) == 0:
#     print("Something bad happened")
#     exit(1)
# 
# # data = dumps({"to": argv[1]})
# data = dumps({"to": "/topics/all", "notification": {"title": "Οι Ιουδαει"}})
# 
# 
# headers = {"Authorization": "key=" + key, "Content-Type": "application/json"}
# 
# rq = request.Request(URL, data=data.encode("UTF-8"), headers=headers)
# print(rq.header_items())
# 
# response = request.urlopen(rq)
# print(response.read())

from sys import argv
from pyfcm import FCMNotification

with open("authKey.txt", "r") as f:
    key = list(f)[0].strip()

push_service = FCMNotification(api_key=key)


registration_id = argv[1]
message_title = "Uber update"
message_body = "Hi john, your customized news for today is ready"
result = push_service.notify_single_device(registration_id=registration_id, message_title=message_title, message_body=message_body)

print(result)
