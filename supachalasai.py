#import urllib2
#from bs4 import BeautifulSoup

#url = 'ที่อยู่ของ supachalasai.html'
#page = urllib2.urlopen(url).read()
#soup = BeautifulSoup(page, "html.parser")
#contentDiv = soup.find("div", {"id": "item_pantip-best_room"})
#print(contentDiv)

try:
    import urllib.request as urllib2
except ImportError:
    import urllib2

from bs4 import BeautifulSoup

url = 'file:' + urllib2.pathname2url(r'supachalasai.html')
print('url ='+url)

page = urllib2.urlopen(url).read()
soup = BeautifulSoup(page, "html.parser")
contentDiv = soup.find("div", {"id": "item_pantip-best_room"})
print(contentDiv)

