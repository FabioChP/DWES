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
puntuacion = 0

for i in range(3):
    print(adivinanzas['adivinanza'+str(i+1)])
    print(adivinanzas['respuestas'+str(i+1)])
    respuesta = input ("Introduce la respuesta (A, B o C):  ")
    if respuesta.lower() == adivinanzas['solucion'+str(i+1)]:
        print("Respuesta correcta")
        puntuacion = puntuacion + 10
    else:
        print("Respuesta NO correcta")
        puntuacion = puntuacion -5
print("Tú puntuación final es :  " + str(puntuacion))