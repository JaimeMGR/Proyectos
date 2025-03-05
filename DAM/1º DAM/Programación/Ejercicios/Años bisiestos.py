año = int(input("Escribe un año "))
if año % 100 == 0 and año % 4 == 0 and año % 100 != 0:  
    print(año, " es un año bisiesto")
else:
    print(año, " no es un año bisiesto")