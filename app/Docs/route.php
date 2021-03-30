<?php
/**
* @OA\Get(
*      path="/api/courses",
*      operationId="Courses",
*      tags={"Courses"},
*      summary="取得課程列表",
*      description="取得課程列表",
*      @OA\Response(
*          response=200,
*          description="請求成功"
*       )
* )
* Returns list of Courses
*/

/**
* @OA\Get(
*      path="/api/courses/{id}",
*      operationId="CourseShow",
*      tags={"Courses"},
*      summary="取得單一課程資訊",
*      description="取得單一課程資訊",
*      @OA\Parameter(
*           name = "id",
*           description = "Courses id",
*           required = true,
*           in = "path",
*           @OA\Schema(
*               type = "integer"
*           )
*      ),
*      @OA\Response(
*          response=200,
*          description="請求成功"
*      ),
*      @OA\Response(
*          response=404,
*          description="找不到對應課程"
*      )
* )
* Returns a Course
*/

/**
* @OA\Post(
*      path="/api/courses",
*      operationId="CourseStore",
*      tags={"Courses"},
*      summary="新增課程資訊",
*      description="新增課程資訊",
*      @OA\Parameter(
*          name="name",
*          description="課程名稱",
*          required=true,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Parameter(
*          name="description",
*          description="課程介紹",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Parameter(
*          name="outline",
*          description="課程大綱",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="課程成功新增"
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
*      path="/api/courses/{id}",
*      operationId="CourseUpdate",
*      tags={"Courses"},
*      summary="更新課程",
*      description="更新課程",
*      @OA\Parameter(
*          name="id",
*          description="Course id",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Parameter(
*          name="name",
*          description="課程名稱",
*          required=true,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Parameter(
*          name="description",
*          description="課程介紹",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Parameter(
*          name="outline",
*          description="課程大綱",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="課程成功更新"
*       ),
*      @OA\Response(
*          response=404,
*          description="課程找不到"
*      ),
*      @OA\Response(
*          response=422,
*          description="驗證錯誤"
*      )
* )
* Update a course
*/

/**
* @OA\Delete(
*      path="/api/courses/{id}",
*      operationId="CourseDelete",
*      tags={"Courses"},
*      summary="刪除課程",
*      description="刪除課程",
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
*          description="課程找不到"
*       )
* )
* Delete course content
*/

/**
* @OA\Get(
*      path="/api/course/{id}",
*      operationId="CourseTestApi",
*      tags={"Courses"},
*      summary="取得單一課程名稱",
*      description="取得單一課程名稱",
*      @OA\Parameter(
*           name = "id",
*           description = "Course id",
*           required = true,
*           in = "path",
*           @OA\Schema(
*               type = "integer"
*           )
*      ),
*      @OA\Response(
*          response=200,
*          description="請求成功"
*      ),
*      @OA\Response(
*          response=500,
*          description="error"
*      )
* )
* Returns a Course name
*/



/**
* @OA\Get(
*      path="/api/comments",
*      operationId="Comments",
*      tags={"Comments"},
*      summary="取得評論列表",
*      description="取得評論列表",
*      @OA\Response(
*          response=200,
*          description="請求成功"
*       )
* )
* Returns list of Comments
*/

/**
* @OA\Get(
*      path="/api/comments/{id}",
*      operationId="CommentShow",
*      tags={"Comments"},
*      summary="取得單一評論資訊",
*      description="取得單一評論資訊",
*      @OA\Parameter(
*           name = "id",
*           description = "Comment id",
*           required = true,
*           in = "path",
*           @OA\Schema(
*               type = "integer"
*           )
*      ),
*      @OA\Response(
*          response=200,
*          description="請求成功"
*      ),
*      @OA\Response(
*          response=404,
*          description="找不到對應評論"
*      )
* )
* Returns a Comment
*/

/**
* @OA\Post(
*      path="/api/comments",
*      operationId="CommentStore",
*      tags={"Comments"},
*      summary="新增評論資訊",
*      description="新增評論資訊",
*      @OA\Parameter(
*          name="edit_id",
*          description="學生id",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Parameter(
*          name="comment_id",
*          description="課程id",
*          required=true,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Parameter(
*          name="text",
*          description="評論內容",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="評論成功新增"
*       ),
*      @OA\Response(
*          response=422,
*          description="驗證錯誤"
*       )
* )
* Create a comment
*/

/**
* @OA\Put(
*      path="/api/comments/{id}",
*      operationId="CommentUpdate",
*      tags={"Comments"},
*      summary="更新評論",
*      description="更新評論",
*      @OA\Parameter(
*          name="id",
*          description="Comment id",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Parameter(
*          name="edit_id",
*          description="學生id",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Parameter(
*          name="comment_id",
*          description="課程id",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="integer"
*          )
*      ),
*      @OA\Parameter(
*          name="text",
*          description="評論內容",
*          required=false,
*          in="query",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="評論成功更新"
*       ),
*      @OA\Response(
*          response=404,
*          description="評論找不到"
*      )
* )
* Update a comment
*/

/**
* @OA\Delete(
*      path="/api/comments/{id}",
*      operationId="CommentsDelete",
*      tags={"Comments"},
*      summary="刪除評論",
*      description="刪除評論",
*      @OA\Parameter(
*          name="id",
*          description="Comment id",
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
*          description="評論找不到"
*       )
* )
* Delete comment content
*/
