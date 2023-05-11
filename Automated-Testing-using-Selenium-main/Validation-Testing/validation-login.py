from selenium import *
from selenium import webdriver
import time
from selenium.webdriver.common.by import By

driver = webdriver.Chrome()
check=True
def wait():
	time.sleep(2)
# get the url
driver.get("http://localhost:8080/DBMSI/admin.php")

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
    wait()
except:
      check=False
      print('Validation Test Failed ❌')
if check:
      print('Test Passed Successfully ✅')