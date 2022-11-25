///Rook detector python script
import time
import Adafruit_ADS1x15
import mysql.connector
from twilio.rest import Client

account_sid = "ACf9638a450d01bb800d2d1cd0e579eae7"
auth_token = "245da23c3449af1bb2106b44ee7ce934"

adc = Adafruit_ADS1x15.ADS1115()

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="laravel"
)

cursor = mydb.cursor()
# Choose a gain of 1 for reading voltages from 0 to 4.09V.
# Or pick a different gain to change the range of voltages that are read:
#  – 2/3 = +/-6.144V
#  –   1 = +/-4.096V
#  –   2 = +/-2.048V
#  –   4 = +/-1.024V
#  –   8 = +/-0.512V
#  –  16 = +/-0.256V
# See table 3 in the ADS1015/ADS1115 datasheet for more info on gain.
value2 = 50000
GAIN = 1
while True:
 value = adc.read_adc(0, gain=GAIN)
 value50 = value2 + 50
 if value50 < value:
     print('smoke detected')
     sql = "INSERT INTO rookmeldings (waar, wat) VALUES ('onder', 'Rook gedecteerd')"
     cursor.execute(sql)
     mydb.commit()
     value = 80000
     client = Client(account_sid, auth_token)
     call = client.calls.create(
     from_='',
     to='',
     url=''
     )
     time.sleep(5)
 value2 = value
 print(value)
 time.sleep(0.5)

