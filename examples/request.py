import requests
import json

url = 'http://emsapi.esy.es/rest/api/'
token = "123"

def insert(name, email, username, password):
    payload = {
        "name": name,
        "email": email,
        "username": username,
        "password": password
    }

    header = {"content-type": "application/json",
              "Authorization": token
              }

    response = requests.post(url+"/new/", data=json.dumps(
        payload), headers=header, verify=True)
    r_json = response.text

    print(response)
    print(r_json)


def search(username, password):
    payload = {
        "username": username,
        "password": password
    }

    header = {"content-type": "application/json",
              "Authorization": token
              }

    response = requests.post(url+"/search/", data=json.dumps(
        payload), headers=header, verify=True)
    r_json = response.text

    print(response)
    print(r_json)


def update(name, email, username, password):
    payload = {
        "name": name,
        "email": email,
        "username": username,
        "password": password
    }

    header = {"content-type": "application/json",
              "Authorization": token
              }

    response = requests.put(url+"/update/", data=json.dumps(
        payload), headers=header, verify=True)
    r_json = response.text

    print(response)
    print(r_json)


# Examples - Uncomment to try

#insert("Full Name", "email@domain.com", "john", "doe")
# search("john", "doe")
#update("Full Name", "email@domain.com", "john", "doe")
#search("john", "doe")
