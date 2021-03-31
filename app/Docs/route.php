<?php

//...
/**
* @OA\Get(
*      path="/web/pages/{courceId}",
*      operationId="operationShow",
*      tags={"Pages"},
*      summary="閱覽課程資訊",
*      description="閱覽課程資訊，以及其修課學生和評論",
*      @OA\Parameter(
*          name="courceId",
*          description="ID of cource",
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
* Show cource content
*/

//...
/**
* @OA\Get(
*      path="/web/upload/{target}",
*      operationId="controllerSubmitRequest",
*      tags={"upload"},
*      summary="更改資訊",
*      description="新增、更改及刪除目標資源",
*      @OA\Parameter(
*          name="target",
*          description="target action",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="string"
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
* Show cource content
*/