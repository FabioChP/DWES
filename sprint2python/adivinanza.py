import random
# Creamos el diccionario de adivinanzas, que nos permite facilmente acceder a las adivinanzas, las respuestas y la solución
adivinanzas = {
    'adivinanza1' :'Tengo agujas y no sé coser, tengo números y no sé leer.',
    'respuestas1':'A.- El Reloj   B.- Un Telefono  C.- La Cuchara',
    'solucion1': 'a',
    'adivinanza2':'Soy bonito por delante y algo feo por detrás, me transformo a cada instante ya que imito a los demás. ¿Sabes quién soy?',
    'respuestas2':'A.- Una Caja  B.- Un Espejo C.- Una Toalla',
    'solucion2':'b',
    'adivinanza3':'Si tú me quieres comer, me verás marrón y peludo, no me podrás romper porque por fuera soy duro.',
    'respuestas3':'A.- El Cacahuete  B.- EL Platano C.- El Coco',
    'solucion3':'c',
}
# Inicialización de las variables
puntuacion = 0          
mostrada = 0
elegida = 0
falloInput = 0
for i in range(2):  
    repetir = 1
    while repetir == 1:
        elegida = random.randint(1,3)   # Generamos 1 número aleatorio
        if elegida == mostrada: # Si el número es el mismo que el ya elegido, se repite
           repetir = 1
        else:
            break
    mostrada = elegida
    print(adivinanzas['adivinanza'+str(elegida)]) # Mosteramos solo los elementos de la adivinanza elegida
    print(adivinanzas['respuestas'+str(elegida)]) # Por como está montado el diccionario solo hace falta añadirle el número y ya indica cual es
    respuesta = input("Introduce la respuesta (A, B o C):  ")
    if respuesta.lower() == adivinanzas['solucion'+str(elegida)]: # Añadimos o restamos puntos dependiendo de si acireta o falla
        print("Respuesta correcta")
        puntuacion = puntuacion + 10
    else:
        print("Respuesta NO correcta")
        puntuacion = puntuacion -5
print("Tú puntuación final es :  " + str(puntuacion)) # Finalmente le mostramos la puntuación
