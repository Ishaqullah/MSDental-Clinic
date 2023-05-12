from selenium import *
from selenium import webdriver
import time
from selenium.webdriver.common.by import By

driver = webdriver.Chrome()
check=True
def wait():
	time.sleep(2)
driver.get("http://localhost:8080/DBMSI/addDoc.php")

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

    driver.get("http://localhost:8080/DBMSI/addDoc.php")
    nameInputField= driver.find_element(By.ID,"form3Example1c")
    nameInputField.send_keys('Ishaqullah')
    wait()
    
    emailInputField= driver.find_element(By.ID,"form3Example3c")
    emailInputField.send_keys('ishaq.siddiqui1401@gmail.com')
    wait()

    specialityInputField= driver.find_element(By.ID,"form3Example4c")
    specialityInputField.send_keys('root canal specialist')
    wait()
    

    addressInputField= driver.find_element(By.ID,"form3Example5c")
    addressInputField.send_keys('B87')
    wait()

    contactInputField= driver.find_element(By.ID,"form3Example6c")
    contactInputField.send_keys('0541563415241')
    wait()

    submitBtn=driver.find_element(By.ID,"add-record")
    submitBtn.send_keys('\n')
except:
      check=False
      print('Validation Test Failed ❌')
if check:
      print('Test Passed Successfully ✅')