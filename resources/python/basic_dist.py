# basic_dist.py
# -*- coding: utf-8 -*-

import statistics

import sys
import json

x = sys.argv[1]
dados = json.loads(x)

media_aritmetica = statistics.mean(dados)
mediana = statistics.median(dados)
moda = statistics.mode(dados)

basic_dist = "A média aritmética é: <b>{}</b> <br>A mediana é: <b>{}</b> <br>E a moda é: <b>{}</b><br>".format(
    media_aritmetica, mediana, moda)

# old_stdout = sys.stdout

# log_file = open("message.log", "w")

# sys.stdout = log_file

# print basic_dist

# sys.stdout = old_stdout

# log_file.close()


print(json.dumps(basic_dist))
