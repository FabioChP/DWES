from operaciones import suma, resta, multiplicacion, division

num1 = 0
num2 = 0
oper = 0
falloInput = 1
repetirLetra = ''
repetir = 1

# ENTRADA DE DATOS INICIAL (números y operaciones)
while repetir == 1:
    while falloInput == 1:
        try:
            num1 = int(input('Introduce el primer operador :  '))
            num2 = int(input('Introduce el segundo operador :  '))
            print('Operación a realizar')
            print('1 - SUMA')
            print('2 - RESTA')
            print('3 - MULTIPLICACIÓN')
            print('4 - DIVISIÓN')
            oper = int(input('?? :   '))

            falloInput = 0
        except ValueError:
            print('No se pueden introducir letras')
            falloInput = 1

    # CÁLCULOS
    if oper == 1:
        print("La solución es :  " + str(suma(num1,num2)))
    if oper == 2:
        print("La solución es :  " + str(resta(num1,num2)))
    if oper == 3:
        print("La solución es :  " + str(multiplicacion(num1,num2)))
    if oper == 4:
        print("La solución es :  " + str(division(num1,num2)))

    # REPETICIÓN DEL PROGRAMA
    falloInput2 = 1
    while falloInput2 == 1:
        repetirLetra = input('¿Quieres hacer otro calculo? :  ')
        if repetirLetra.lower() == 's':
            repetir = 1
            falloInput = 1
            falloInput2 = 0
        elif repetirLetra.lower() == 'n':
            repetir = 0
            falloInput = 0
            falloInput2 = 0
        else:
            falloInput2 = 1

