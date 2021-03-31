<?php
/**
* @SWG\Get(
*      path="/api/courses/{id}",
*      operationId="courseShow",
*      tags={"course"},
*      summary="取得課程資料",
*      description="取得課程資料",
*      @SWG\Parameter(
*          name="id",
*          description="course id",
*          in ="path",
*          required=true,
*          @SWG\Schema(
*              type="integer"
*          )
*      ),
*      @SWG\Response(
*          response=200,
*          description="請求成功"
*       ),
*      @SWG\Response(
*          response=404,
*          description="找不到對應課程"
*       )
* )
* return course
*/
/**
* @SWG\Post(
*      path="/api/",
*      operationId="courseStore",
*      tags={"course"},
*      summary="新增課程",
*      description="新增課程",
*      @SWG\Parameter(
*          name="name",
*          description="課程名稱",
*          required=true,
*          in ="query",
*          @SWG\Schema(
*              type="string"
*          )
*      ),
*      @SWG\Response(
*          response=200,
*          description="課程成功建立"
*       ),
*      @SWG\Response(
*          response=422,
*          description="驗證錯誤"
*       )
* )
* Create a course
*/

/**
* @SWG\Put(
*      path="/api/{coursesid}",
*      operationId="courseUpdate",
*      tags={"course"},
*      summary="更新課程",
*      description="更新課程",
*      @SWG\Parameter(
*          name="id",
*          description="course id",
*          required=true,
*          in ="path",
*          @SWG\Schema(
*              type="integer"
*          )
*      ),
*      @SWG\Parameter(
*          name="name",
*          description="課程名稱",
*          required=false,
*          in ="query",
*          @SWG\Schema(
*              type="string"
*          )
*      ),
*     
*      @SWG\Response(
*          response=200,
*          description="請求成功"
*       ),
*      @SWG\Response(
*          response=404,
*          description="課程找不到"
*       )
* )
* Update course
*/

/** 
* @SWG\Delete(
*      path="/api/{coursesid}",
*      operationId="courseDelete",
*      tags={"course"},
*      summary="刪除課程",
*      description="刪除課程",
*      @SWG\Parameter(
*          name="id",
*          description="course id",
*          required=true,
*          in ="path",
*          @SWG\Schema(
*              type="integer"
*          )
*      ),
*      @SWG\Response(
*          response=200,
*          description="請求成功"
*       ),
*      @SWG\Response(
*          response=404,
*          description="課程找不到"
*       )
* )
* Delete course
*/
