from selenium import *
from selenium import webdriver
import time
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select

driver = webdriver.Chrome()
check=True
def wait():
	time.sleep(2)
driver.get("http://localhost:8080/DBMSI/deleteDoc.php")

driver.maximize_window()
driver.implicitly_wait(5)
try:
    emailInputField= driver.find_element(By.CSS_SELECTOR,"input[name='email']")
    emailInputField.send_keys('ishaq.siddiqui1401@gmail.com')
    wait()
    passInputField= driver.find_element(By.CSS_SELECTOR,"input[name='password']")
    passInputField.send_keys('isaac_1401')
    submitBtn=driver.find_element(By.ID,"login")
    submitBtn.send_keys('\n')

    driver.get("http://localhost:8080/DBMSI/deleteDoc.php")
    idInputField= driver.find_element(By.ID,"form3Example1c")
    idInputField.send_keys('9')
    wait()
    
    submitBtn=driver.find_element(By.ID,"delete-record")
    submitBtn.send_keys('\n')
except:
      check=False
      print('Validation Test Failed ❌')
if check:
      print('Test Passed Successfully ✅')