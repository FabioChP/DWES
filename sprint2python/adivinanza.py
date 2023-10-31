adivinanzas = {
    'adivinanza1' : 'Tengo agujas y no sé coser, tengo números y no sé leer.',
    'respuestas1':'A.- El Reloj   B.- Un Telefono  C.- La Cuchara',
    'solucion1': 'a',
}

print(adivinanzas['adivinanza1'])
print(adivinanzas['respuestas1'])
respuesta = input ("Introduce la respuesta (A, B o C):  ")
if respuesta.lower() == adivinanzas['solucion1']:
    print("Respuesta correcta")
else:
    print("Respuesta NO correcta")