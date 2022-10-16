## 啟動專案

請先安裝docker、docker compose，安裝完之後進入資料夾下命令行:docker compose up，即可在http://127.0.0.1:8111看到該專案。

## API 介接方法
新增佈告
呼叫方式:post
| Body 參數      | 格式          | 必填  | 說明     |
| :------------- |:------------- | :-----| :------ |
| content        | string       |required|布告內容 |

Response
```
{
  "status": "ok",
  "message": "新增成功",
  "post": {
    "content": "as",
    "updated_at": "2022-10-16T10:16:43.000000Z",
    "created_at": "2022-10-16T10:16:43.000000Z",
    "id": 7
  }
}
```

修改佈告
呼叫方式:put
| url 參數      | 格式          | 必填  | 說明     |
| :------------- |:------------- | :-----| :------ |
| id        | integer       |required|布告id |

| Body 參數      | 格式          | 必填  | 說明     |
| :------------- |:------------- | :-----| :------ |
| content        | string       |required|布告內容 |

Response
```
{
  "status": "ok",
  "message": "修改成功",
  "post": {
    "id": 8,
    "content": "34",
    "created_at": "2022-10-16T10:30:10.000000Z",
    "updated_at": "2022-10-16T10:30:13.000000Z"
  }
}
```

刪除佈告
呼叫方式:delete
| url 參數      | 格式          | 必填  | 說明     |
| :------------- |:------------- | :-----| :------ |
| id        | integer       |required|布告id |

Response
```
{"status":"ok","message":"刪除成功"}
```

查詢佈告
呼叫方式:get
| url 參數      | 格式          | 必填  | 說明     |
| :------------- |:------------- | :-----| :------ |
| id        | integer       |required|布告id |

Response
```
{
  "status": "ok",
  "message": "查詢成功",
  "post": {
    "id": 7,
    "content": "as",
    "created_at": "2022-10-16T10:16:43.000000Z",
    "updated_at": "2022-10-16T10:16:43.000000Z"
  }
}
```

## 服務架構

三個docker container
nginx + php-fpm + mysql
由於使用docker compose三個container為同一個docker網路
三個container之間對於外部網路(本地主機)來說是不可見的
但是三個container之間的網路是可以互通的
對網址開放nginx port讓本地主機(或本地主機之外的外部連線)可以通過nginx訪問web服務
其餘php-fpm與mysql是不會暴露port給本地主機
php-fpm與nginx使用cgi協議通信
php-fpm與mysql使用mysql協議通信

