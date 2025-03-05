from asyncore import loop
from http import client
from typing import final
from pymongo import MongoClient


##Aquí empezamos a conectarnos
print ("Por ahora vamos bien")
client = MongoClient("mongodb://localhost:27017")
print("Conexión existosa")

##Procedemos a conectarse a la base de datos
db = client["Skippy"]
print("Conectando a la base de datos...")

#Procedemos a conectarnos al set de datos
MensajeroDelSenor = db["Frases de Skippy"]
print("Sabe una kosa, tamo conetao")

#Procedemos a descargar frase de slippy
x = MensajeroDelSenor.find_one({"tema": "Apocalipsis"})
print(x)

cursos = MensajeroDelSenor.find({})
for document in cursos:
    print(document)
