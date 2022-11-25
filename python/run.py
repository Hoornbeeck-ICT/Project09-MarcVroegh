//probeersel om alle scripts tegelijk te runnen
import subprocess

p1 = subprocess.Popen(['motion2.py'])
p2 = subprocess.Popen(['smoke.py'])
p3 = subprocess.Popen(['windows.py'])

p1.wait();
p2.wait();
p3.wait();
