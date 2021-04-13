# Laravel beginner

## 運行環境需求

參照官方文件 [Laravel 7 requirements](https://laravel.com/docs/7.x#server-requirements) 可達最低運行需求。

## 必要工具

- Docker
- Docker Compose

## 作業一
- 新增課程頁面
  - localhost:[port]/ 
- swagger
  - /api/documentation
  
## 作業二
- 新增學習歷程頁面
  - 首頁各課程連結為學習歷程頁面
- 新增資料表Hitory
  - 新增對應migrate物件
  - 新增對應seeder物件 
  - 新增History相關class: Model、Controller
  - 學習歷程History與Course為多對一關係

## 作業三
- RestfulAPI
  - 新增學習歷程api: /histories/{courseId}
- 測試
  - 新增此api的feature test: HistoryTest.php

