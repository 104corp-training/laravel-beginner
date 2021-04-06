<?php

//...
/**
 * @OA\Get(
 *      path="/web/pages/{courceId}",
 *      operationId="operationShow",
 *      tags={"Pages"},
 *      summary="閱覽課程資訊",
 *      description="閱覽課程資訊，以及其修課學生和評論",
 * @OA\Parameter(
 *          name="courceId",
 *          description="ID of cource",
 *          required=true,
 *          in="path",
 * @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 * @OA\Response(
 *          response=200,
 *          description="請求成功"
 *       ),
 * @OA\Response(
 *          response=404,
 *          description="資源不存在"
 *       )
 * )
 * Show cource content
 *
 * @OA\Get(
 *      path="/web/upload/{target}",
 *      operationId="controllerSubmitRequest",
 *      tags={"upload"},
 *      summary="更改資訊",
 *      description="新增、更改及刪除目標資源",
 * @OA\Parameter(
 *          name="target",
 *          description="target action",
 *          required=true,
 *          in="path",
 * @OA\Schema(
 *              type="string"
 *          )
 *      ),
 * @OA\Response(
 *          response=200,
 *          description="請求成功"
 *       ),
 * @OA\Response(
 *          response=404,
 *          description="資源不存在"
 *       )
 * )
 * upload target content
 *
 * @OA\Post(
 *      path="/web/courses/{action}",
 *      operationId="action",
 *      tags={"newCourse"},
 *      summary="新增課程選課",
 *      description="新增課程選課",
 * @OA\Parameter(
 *          name="course_id",
 *          description="選課之課程編號",
 *          required=true,
 *          in="query",
 * @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="student_id",
 *          description="選課之學生編號",
 *          required=true,
 *          in="query",
 * @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 * @OA\Response(
 *          response=201,
 *          description="資源成功建立"
 *       ),
 * @OA\Response(
 *          response=404,
 *          description="請求格式錯誤"
 *       )
 * )
 * Create a new course of a student
 *
 * @OA\Post(
 *      path="/web/comments/{action}",
 *      operationId="action",
 *      tags={"commment"},
 *      summary="對於評論的操作",
 *      description="新增、更改或刪除評論",
 * @OA\Parameter(
 *          name="comment_id",
 *          description="評論對應編號",
 *          in="query",
 * @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="select_student",
 *          description="評論對應學生",
 *          in="query",
 * @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="select_course",
 *          description="評論對應課程",
 *          in="query",
 * @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="score",
 *          description="評論對應分數",
 *          in="query",
 * @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 * @OA\Parameter(
 *          name="comment",
 *          description="評論對應內容",
 *          in="query",
 * @OA\Schema(
 *              type="string"
 *          )
 *      ),
 * @OA\Response(
 *          response=201,
 *          description="資源成功建立"
 *       ),
 * @OA\Response(
 *          response=404,
 *          description="請求格式錯誤"
 *       )
 * )
 * Create a new course of a student
 */