
#Cuando estés en octubre hay descuento
import datetime

mes = datetime.datetime.today().month
precio = 100
descuento = 0.85
IVA = 1.21
precio_final = 0

if mes == 10:
    precio_final = precio * descuento * IVA
    print ('El precio con descuento es un total de', precio_final, "€")
else:
    precio_final = precio * IVA
    print ("El precio es un total de", precio_final, "€")