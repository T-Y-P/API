# API 
这是一个api文件整合


## PHP对接百度API提交普通收录/SEO 文件 baiduapi1.php baiduapi2.php
#### 说明

百度站长的资源提交分为快速收入和普通收录，资源的提交方式有：

- API推送：最为快速的提交方式，建议您将站点当天新产出链接立即通过此方式推送给百度，以保证新链接可以及时被百度收录。
- sitemap：您可以定期将网站链接放到Sitemap中，然后将Sitemap提交给百度。百度会周期性的抓取检查您提交的Sitemap，对其中的链接进行处理，但收录速度慢于API推送。
- 手动提交：如果您不想通过程序提交，那么可以采用此种方式，手动将链接提交给百度

多种提交方式互不冲突

###### 使用的时候，把上面的域名跟百度的token换成自己的

- 建议放到网站的底部 这样访问一次 百度提交一次

![返回成功图](https://ask.qcloudimg.com/http-save/yehe-2799756/fe6a51ad90a4cb9ad5ea408df1dea46b.png)

状态码为200，可能返回以下字段：

| 字段 | 是否必选 | 参数类型 | 说明 |
|:----|:----|:----|:----|
| success | 是  | int | 成功推送的url条数 |
| remain | 是 | int | 当天剩余的可推送url条数 |
| not\_same\_site | 否 | array | 由于不是本站url而未处理的url列表 |
| not\_valid | 否 | array | 不合法的url列表 |

博客 [www.czmz.top](https://www.czmz.top)
###### baiduapi1文件
> 适单页面，单域名
###### baiduapi2文件
> 适多域名 多站点站群类