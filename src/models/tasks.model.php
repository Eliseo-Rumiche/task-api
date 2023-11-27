<?php

class Task
{
    public static function createTask(string $title, string $description ,int $status = 0)
    {
        $task = ORM::for_table('task')->create();
        $task->title = $title;
        $task->description = $description;
        $task->status = $status;
        $task->save();
        return $task->as_array();
    }

    public static function getAll()
    {
        $data = ORM::for_table('task')->find_array();
        return $data;
    }

    public static function getTask($id)
    {
        $data = ORM::for_table('task')->find_one($id);
        if($data) {
            return $data->as_array();
        }else{
            return ['error' => 'invalid task'] ;
        }
    }
        

     

    public static function updateTask(int $id, string $title, string $description ,int $status = 0)
    {

      $task =  ORM::for_table('task')->find_one($id);
      if ($task){
        $task->title = $title;
        $task->description = $description;
        $task->status = $status;
        $task->save();
         return $task;
      }else{
         return ['error' => "invalid task"];
      }
    }

    public static function deleteTask($id)
    {
        $data = ORM::for_table('task')->find_one($id);
        if($data) {
            $task = $data->as_array();
            $data->delete();
            return $task;
        }else{
            return ['error' => 'invalid task'] ;
        }
    }


}
