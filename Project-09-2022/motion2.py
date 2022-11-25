import RPi.GPIO as GPIO
import time
import mysql.connector
import threading

def infiniteloop1():
    while GPIO.input(PIR) == 1:
        GPIO.output(light01, GPIO.HIGH)

def infiniteloop2():
    while GPIO.input(PIR2) == 1:
        GPIO.output(light02, GPIO.HIGH)

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="laravel"
)

cursor = mydb.cursor()

GPIO.setmode(GPIO.BCM)

#Initialization of the SCB-PIR on PIN 12
PIR = 18
PIR2 = 17
i = 0
ii = 0
light = 0
light2 = 0
GPIO.setup(PIR, GPIO.IN)
GPIO.setup(PIR2, GPIO.IN)
light02 = 13
light01 = 20
GPIO.setup(light02, GPIO.OUT)
GPIO.setup(light01, GPIO.OUT)

print ("PIR-Sensor aktive!")
try: # Start of a loop
 while True:
  if(GPIO.input(PIR) == 0 and i == 0): # When Sensor Input = 0
   print("No movement...") # When the print command is executed
   sql = "INSERT INTO bewegings (onoff, waar) VALUES ('off', 'onder')"
   cursor.execute(sql)
   mydb.commit()
   time.sleep(6)
   GPIO.output(light01, GPIO.LOW)
   sql2 = "INSERT INTO verlichtings (onoff, waar) VALUES ('off', 'onder')"
   cursor.execute(sql2)
   mydb.commit()
   i = 1
  elif(GPIO.input(PIR) == 1 and i == 1): # When Sensor Input = 1
   print("Movement detected!") # When the print command is executed
   sql = "INSERT INTO bewegings (onoff, waar) VALUES ('on', 'onder')"
   cursor.execute(sql)
   sql2 = "INSERT INTO verlichtings (onoff, waar) VALUES ('on', 'onder')"
   cursor.execute(sql2)
   mydb.commit()
   i = 0
   thread1 = threading.Thread(target=infiniteloop1)
   thread1.start()
  if(GPIO.input(PIR2) == 0 and ii == 0): # When Sensor Input = 0
   print("No movement2...")
   sql = "INSERT INTO bewegings (onoff, waar) VALUES ('off', 'boven')"
   cursor.execute(sql)
   mydb.commit()
   time.sleep(6)
   GPIO.output(light02, GPIO.LOW)
   sql2 = "INSERT INTO verlichtings (onoff, waar) VALUES ('off', 'boven')"
   cursor.execute(sql2)
   mydb.commit()
   ii = 1
  elif(GPIO.input(PIR2) == 1 and ii == 1): # When Sensor Input = 1
   print("Movement detected2!") # When the print command is executed
   sql = "INSERT INTO bewegings (onoff, waar) VALUES ('on', 'boven')"
   cursor.execute(sql)
   sql2 = "INSERT INTO verlichtings (onoff, waar) VALUES ('on', 'boven')"
   cursor.execute(sql2)
   mydb.commit()
   ii = 0
   thread2 = threading.Thread(target=infiniteloop2)
   thread2.start()
except KeyboardInterrupt:
   GPIO.cleanup()
   cursor.close()
   cnx.close()
   GPIO.output(light02, GPIO.LOW)
   GPIO.output(light01, GPIO.LOW)