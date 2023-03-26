### 获取QQ头像加密链接

- 请求参数
timeqq.php?qq=


- qq  //需要获取头像的QQ
- si  //获取头像的像素的大小,1/2=40,3=100,4=140,5=640,默认4
- typ  //返回格式text/json

#### 试例
```
https://www.0735.pro/api/timeqq.php?qq=10086
```

#### 返回值 

```
{
    "code": 1,
    "text": "获取成功!",
    "uin": "10086",
    "img": "http://q.qlogo.cn/g?b=timqq&k=XYu1IPBMFmk4utZdja5vKA&kti=ZCAB6AAAAAA&s=4"
}
```

[![获取QQ头像加密链接](https://s1.ax1x.com/2023/03/26/pprfjkF.png)](https://imgse.com/i/pprfjkF)

### 小插曲

> 腾云先锋（TDP，Tencent Cloud Developer Pioneer）是腾讯云 GTS 官方组建并运营的技术开发者群体。这里有最专业的开发者&客户，能与产品人员亲密接触，专有的问题&需求反馈渠道，有一群志同道合的兄弟 姐妹，[来加入属于我们开发者的社群吧 ](https://cloud.tencent.com/developer/article/1855195?from=10680)

#### ps 进群时候时候记得跟管理员说tdp会员 网友-cvm推荐