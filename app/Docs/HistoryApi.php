<?php

/**
 * @OA\Get(
 *     path="/api/courses/histories/{courseId}",
 *     operationId="historyShow",
 *     tags={"History"},
 *     summary="以課程id取得學習歷程",
 *     description="以課程id取得學習歷程",
 *     security={
 *          {
 *              "Authenticate": {}
 *          }
 *      },
 *     @OA\Parameter(
 *         name="courseId",
 *         description="Course History",
 *         required=true,
 *         in="path",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="請求成功"
 *     ),
 * )
 */
