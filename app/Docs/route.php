<?php

/**
* @OA\GET(
*      path="/api/hunter",
*      operationId="hunterIndex",
*      tags={"Hunter"},
*      summary="get whole courses",
*      description="get whole courses",
*      @OA\Response(
*          response=200,
*          description="Show the request result"
*       ),
*      @OA\Response(
*          response=500,
*          description="message : Cannot find this course"
*      )
*   )
*
*/

/**
 * @OA\POST(
 *      path="/api/hunter",
 *      operationId="hunterStore",
 *      tags={"Hunter"},
 *      summary="insert new data to course table",
 *      description="insert new data to course table",
 *      @OA\Response(
 *          response=200,
 *          description="Show the request result",
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="message : Validation error",
 *      )
 *   )
 */

 /**
 * @OA\PUT(
 *      path="/api/hunter/{hunter}",
 *      operationId="hunterUpdate",
 *      tags={"Hunter"},
 *      summary="update the data from exist column",
 *      description="update the data from exist column",
 *      @OA\Response(
 *          response=200,
 *          description="message : true",
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="message : Cannot find this course",
 *      )
 *   )
 */

 /**
 * @OA\DELETE(
 *      path="/api/hunter/{hunter}",
 *      operationId="hunterDestroy",
 *      tags={"Hunter"},
 *      summary="delete the chose column ",
 *      description="delete the chose column",
 *      @OA\Response(
 *          response=200,
 *          description="message : true",
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="message : Cannot find this course",
 *      )
 *   )
 */