from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
import ast
import time

def defectTest():
    options = Options()
    options.add_argument('--start-maximized')

    service = Service()

    dc = DesiredCapabilities.CHROME
    dc['loggingPrefs'] = { 'browser':'ALL' }

    driver = webdriver.Chrome(options=options, service=service, desired_capabilities=dc)
    driver.get(r'https://rayan-ali1083.github.io/Automated-Testing-using-Selenium/')

    file_input = driver.find_element('id',"formFile")

    file_input.send_keys(r"input-wrong.txt")                                        # check with input.txt and input-wrong.txt

    f = open("input-wrong.txt", "r")
                                                
    ls = ast.literal_eval(f.readline())
    ls = ls.split(',')

    check = False
    for ch in ls:
        if ch.isdigit() == False:
            check = True
            break

    time.sleep(45)
    assert check != True, 'Wrong input given to the program. This type of data cannot be sorted. DEFECT TEST FAILED'
    print("DEFECT TEST PASSED")
    driver.quit()

defectTest()