#aa
import sys
sys.path.insert(0, '/path/to/matplotlib')
import json
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
dir = "/home/wilhelm/github/websim/storage/app/files/" #diretorio
filename = str(datetime.now().strftime("%b %d %Y %H:%M:%S")) #nome do arquivo (data atual + hora)
fig.savefig(dir + filename + ' plot.png')
####################################################################
x=sys.argv[1]
data=json.loads(x)
data.sort(reverse = 1)
print(json.dumps(data))