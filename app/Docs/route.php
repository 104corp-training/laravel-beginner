<?php
/**
* @OA\Get(
*      path="/api/courses",
*      operationId="courses",
*      tags={"Courses"},
*      summary="取得所有課程",
*      description="取得所有課程",
*      @OA\Response(
*          response=200,
*          description="請求成功"
*       )
* )
* Returns list of courses
*/

/**
* @OA\Get(
*      path="/api/course/{id}",
*      operationId="course",
*      tags={"Course"},
*      summary="取得課程詳情",
*      description="取得課程詳情",
*      @OA\Parameter(
*          name="id",
*          description="Course id",
*          required=true,
*          in="path",
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
*          description="資源不存在"
*       )
* )
* Show course content
*/
