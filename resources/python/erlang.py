#!/usr/bin/python3

import sys
import json

"""
import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
import numpy as np
from datetime import datetime
import string
import re


t = np.arange(0.0, 2.0, 0.01)
s = 1 + np.sin(2 * np.pi * t)

fig, ax = plt.subplots()
ax.plot(t, s)

ax.set(xlabel='time (s)', ylabel='voltage (mV)',
       title='About as simple as it gets, folks')
ax.grid()
directory = "/home/wilhelm/github/websim/storage/app/files/" #diretorio
time = str(datetime.now().strftime("%b %d %Y %H:%M:%S")) #hora atual
filename = time + ' plot.png' #nome do arquivo (diretorio + hora)
fig.savefig(directory + filename)
####################################################################
x=sys.argv[1]
data=json.loads(x)
data[0] = filename
"""

x=sys.argv[1]
data=json.loads(x)

data = "PYTHON WAS HERE BITCH"
print(json.dumps(data))
