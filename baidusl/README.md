### 检测文章是否被收录

php接口版js检测文章是否被收录

- 调用方法
html 
```html
<a id="czmz_baidu" rel="external nofollow" target="_blank"></a>

```
js
```javascript
$(function () {
    $.getJSON('https://www.0735.pro/api/baidu.php?url='+window.location.href, function(json, textStatus) { 
        //https://www.0735.pro/api/baidu.php   是我自己搭建的测试接口 正式环境还需自己搭建
        if (json.state == 1) {
            $('#czmz_baidu').html('百度已收录');
            $("#czmz_baidu").attr('href','https://www.baidu.com/s?wd='+document.title);         }else{
            $('#czmz_baidu').html('百度暂未收录');
            $('#czmz_baidu').css('color','red');
            $('#czmz_baidu').attr('href','http://zhanzhang.baidu.com/sitesubmit/index?sitename='+window.location.href);            
        }
    });
});

```


### 小插曲

> 腾云先锋（TDP，Tencent Cloud Developer Pioneer）是腾讯云 GTS 官方组建并运营的技术开发者群体。这里有最专业的开发者&客户，能与产品人员亲密接触，专有的问题&需求反馈渠道，有一群志同道合的兄弟 姐妹，[来加入属于我们开发者的社群吧 ](https://cloud.tencent.com/developer/article/1855195?from=10680)

#### ps 进群时候时候记得跟管理员说tdp会员 网友-cvm推荐
