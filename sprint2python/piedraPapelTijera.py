import random
i = 0
jugada = 0
falloInput = 1
resultado = ''
salida = ''
ganadas = 0

while i < 5:
    print('Jugada número '+str(i+1))
    falloInput = 1
    while falloInput == 1:
        print('---------------------------')
        print('1 - Piedra')
        print('2 - Papel')
        print('3 - Tijera')
        try:
            jugada = int(input('Elige:  '))
        except ValueError:
            jugada = 0
        if jugada < 1 or jugada > 3:
            falloinput = 0
        else:
            break
    jugadaRival = random.randint(1,3)
    if jugada == 1:
        if jugadaRival == 2:
            resultado = 'd'
            salida = 'piedra pierde contra papel'
        elif jugadaRival == 3:
            resultado = 'v'
            salida = 'piedra gana a tijera'
    elif jugada == 2:
        if jugadaRival == 1:
            resultado = 'v'
            salida = 'papel gana a piedra'
        elif jugadaRival == 3:
            resultado = 'd'
            salida = 'papel pierde contra tijera'
    else:
        if jugadaRival == 1:
            resultado = 'd'
            salida = 'tijera pierde contra piedra'
        elif jugadaRival == 2:
            resultado = 'v'
            salida = 'tijera gana a papel'
    if resultado == 'v':
        print('GANASTE, ' + salida)
        ganadas = ganadas + 1
        i = i + 1
    elif resultado == 'd':
        print ('PERDISTE, '+ salida)
        i = i + 1
    else:
        print('EMPATE, no cuenta la ronda')
    print('---------------------------')
print('GANASTE '+str(ganadas)+' RONDAS')
if ganadas >= 3:
    print('---------------------------')
    print('GANASTE LA PARTIDA')
    print('---------------------------')
else:
    print('---------------------------')
    print('PERDISTE LA PARTIDA')
    print('---------------------------')