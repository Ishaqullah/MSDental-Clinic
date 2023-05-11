from selenium import webdriver
from selenium.webdriver.common.by import By
driver = webdriver.Chrome()
# implicit wait applied
driver.implicitly_wait(0.5)
driver.get("https://syedmuhammadfaheem.github.io/SortingAlgorithmsVisualizer/")
# to identify element and obtain innerHTML with get_attribute
l = driver.find_element(By.CSS_SELECTOR,"h2")
print("HTML code of element: " + l.get_attribute('innerHTML'))