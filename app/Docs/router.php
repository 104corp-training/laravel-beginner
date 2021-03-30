<?php

/**
* @OA\Get(
*      path="/api/courses/{id}",
*      operationId="courseShow",
*      tags={"course"},
*      summary="取得課程資料",
*      description="取得課程資料",
*      @OA\Parameter(
*          name="id",
*          description="course id",
*          in ="path",
*          required=true,
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="請求成功"
*       ),
*      @OA\Response(
*          response=404,
*          description="找不到對應課程"
*       )
* )
* return course
*/
/**
* @OA\Post(
*      path="/api/",
*      operationId="courseStore",
*      tags={"course"},
*      summary="新增課程",
*      description="新增課程",
*      @OA\Parameter(
*          name="name",
*          description="課程名稱",
*          required=true,
*          in ="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="課程成功建立"
*       ),
*      @OA\Response(
*          response=422,
*          description="驗證錯誤"
*       )
* )
* Create a course
*/

/**
* @OA\Put(
*      path="/api/{coursesid}",
*      operationId="courseUpdate",
*      tags={"course"},
*      summary="更新課程",
*      description="更新課程",
*      @OA\Parameter(
*          name="id",
*          description="course id",
*          required=true,
*          in ="path",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Parameter(
*          name="name",
*          description="課程名稱",
*          required=false,
*          in ="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*     
*      @OA\Response(
*          response=200,
*          description="請求成功"
*       ),
*      @OA\Response(
*          response=404,
*          description="課程找不到"
*       )
* )
* Update course
*/

/** 
* @OA\Delete(
*      path="/api/{coursesid}",
*      operationId="courseDelete",
*      tags={"course"},
*      summary="刪除課程",
*      description="刪除課程",
*      @OA\Parameter(
*          name="id",
*          description="course id",
*          required=true,
*          in ="path",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="請求成功"
*       ),
*      @OA\Response(
*          response=404,
*          description="課程找不到"
*       )
* )
* Delete course
*/

