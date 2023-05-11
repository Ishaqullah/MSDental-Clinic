from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
import ast
import time

def validationTest():
    options = Options()
    options.add_argument('--start-maximized')

    service = Service()

    dc = DesiredCapabilities.CHROME
    dc['loggingPrefs'] = { 'browser':'ALL' }

    driver = webdriver.Chrome(options=options, service=service, desired_capabilities=dc)
    driver.get(r'https://rayan-ali1083.github.io/Automated-Testing-using-Selenium/')

    file_input = driver.find_element('id',"formFile")

    file_input.send_keys(r"input.txt")                                                                      # check with input.txt and input-wrong.txt                                                     # check with input.txt and inputw.txt


    submitButton = driver.find_element('xpath',"//button[@id='ins-btn']")                                  # check with ins-btn and bub-btn
    submitButton.send_keys("\n")
    
    f = open("input.txt", "r")                                                                              # check with input.txt and inputw.txt
                                                
    ls = ast.literal_eval(f.readline())
    arr = driver.execute_script('return data')
    ls = ls.split(',')
    ls = [int(val) for val in ls]
    ls = sorted(ls)
    arr = [int(val) for val in arr]
    time.sleep(45)

    assert ls == arr, "Data not sorted. TEST FAILED"
    print("VALIDATION TEST PASSED")
    driver.quit()

validationTest()