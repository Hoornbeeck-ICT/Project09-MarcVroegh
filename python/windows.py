///Python script die data van twee schakelaars in de database zet.
import  RPi.GPIO as GPIO
import time
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="laravel"
)

cursor = mydb.cursor()

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(15, GPIO.IN,pull_up_down=GPIO.PUD_UP)
GPIO.setup(23, GPIO.IN,pull_up_down=GPIO.PUD_UP)

i = 1
ii = 1

while True:
   inputValue = GPIO.input(15)
   if (inputValue == False and i == 0):
       print("Raam dicht linker")
       sql2 = "INSERT INTO ramens (onoff, waar) VALUES ('on', 'onder')"
       cursor.execute(sql2)
       mydb.commit()
       i = 1
       time.sleep(1)
   if (inputValue == True and i == 1):
       print("Raam open linker")
       sql2 = "INSERT INTO ramens (onoff, waar) VALUES ('off', 'onder')"
       cursor.execute(sql2)
       mydb.commit()
       i = 0
       time.sleep(1)
   inputValue2 = GPIO.input(23)
   if (inputValue2 == False and ii == 0):
       print("Raam dicht rechter")
       sql2 = "INSERT INTO ramens (onoff, waar) VALUES ('on', 'boven')"
       cursor.execute(sql2)
       mydb.commit()
       ii = 1
       time.sleep(1)
   if (inputValue2 == True and ii == 1):
       print("Raam open rechter")
       sql2 = "INSERT INTO ramens (onoff, waar) VALUES ('off', 'boven')"
       cursor.execute(sql2)
       mydb.commit()
       ii = 0
       time.sleep(1)
        
