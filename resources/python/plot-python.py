# analyse.json.py
#C:\python27\python

import sys
sys.path.insert(0, '/path/to/matplotlib')
import json
import matplotlib

x=sys.argv[1]
data=json.loads(x)

data.sort(reverse = 1)


print(json.dumps(data))