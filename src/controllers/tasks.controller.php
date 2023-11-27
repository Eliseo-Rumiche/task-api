<?php
require ROOT_DIR.'/src/models/tasks.model.php';
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="Task Api", version="0.1")
 */
class TaskController
{


    /**
     * @OA\Post(
     *     path="/api/tasks/",
     * @OA\RequestBody(
     *         required=true,
     * @OA\JsonContent(
     *             type="object",
     * @OA\Property(property="title",       type="string", example="Create Api"),
     * @OA\Property(property="description", type="string", example="Create Task Api"),
     * @OA\Property(property="status",      type="boolean", example=true,nullable=true),
     *         )
     *     ),
     * @OA\Response(response="200",         description="Create Task")
     * )
     */
    public static function createTask()
    {
        $data = flight::request()->data;
        if(!isset($data['title']) || !isset($data['description']) ) {
            return flight::json(['error'=> 'invalid data']);   
        }
      
        $title = $data['title'];
        $description = $data['description'];
        $status = $data['status'] ?? 0; 
        $task = Task::createTask($title, $description, $status);
        flight::json(['data'=>$task]);
    }
 
    /**
     * @OA\Get(
     *     path="/api/tasks/",
     * @OA\Response(response="200", description="Get All Tasks")
     * )
     */
    public static function getAll()
    {
        $data = Task::getAll();
        flight::json(['data'=> $data]);
    }

    /**
     * @OA\Get(
     *     path="/api/tasks/{id}",
     * @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Task ID",
     * @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     * @OA\Response(response="200", description="Get Task")
     * )
     */
    public static function getTask($id)
    {
        $task = Task::getTask($id); 
        flight::json(['data'=>$task]);
    } 

    /**
     * @OA\Delete(
     *     path="/api/task/{id}",
     * @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Task ID",
     * @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     * @OA\Response(response="200", description="Delete Task")
     * )
     */
    public static function deleteTask($id)
    {
        $task = Task::deleteTask($id);
         
        flight::json(['data'=>$task]);
    }


   
    /**
     * @OA\Put(
     *     path="/api/tasks/{id}",
     * @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Task ID",
     * @OA\Schema(
     *             type="integer"
     *         )
     *     ),

     * @OA\RequestBody(
     *         required=true,
     * @OA\JsonContent(
     *             type="object",
     * @OA\Property(property="title",       type="string", example="Create Api"),
     * @OA\Property(property="description", type="string", example="Create Task Api"),
     * @OA\Property(property="status",      type="boolean", example=true,nullable=true),
     *         )
     *     ),
     * @OA\Response(response="200",         description="Create Task")
     * )
     */

    public static function updateTask($id)
    {
        $data = flight::request()->data;
        if(!isset($data['title']) || !isset($data['description']) ) {
            return flight::json(['error'=> 'invalid data']);   
        }

        $title = $data['title'];
        $description = $data['description'];
        $status = $data['status'] ?? 0 ;
        $task = Task::updateTask($id, $title, $description, $status);
        flight::json(['task'=>$task]);

    }

}
