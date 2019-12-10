# basic_dist.py
# -*- coding: utf-8 -*-

import statistics

import sys
import json
import numpy as np

x = sys.argv[1]
dados = json.loads(x)
basic_dist=[]

basic_dist[0] = statistics.median(dados)
basic_dist[1] = statistics.mean(dados)
basic_dist[2] = statistics.stdev(dados)
basic_dist[3] = np.var(dados)

try:
    basic_dist[4] = statistics.mode(dados)
except statistics.StatisticsError:
    basic_dist[4] = 'null'

# [0]mediana, [1]media_aritmetica, [2]desvio_padrao, [3]variancia, [4]moda 

print(json.dumps(basic_dist))
