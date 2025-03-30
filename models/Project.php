<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

class Project extends ActiveRecord
{
    public static function tableName()
    {
        return 'tom_project'; // Table name in the database
    }

    public function getTasks()
    {
        return $this->hasMany(Task::class, ['project_id' => 'id']);
    }

    public function getProgress(): int
    {
        // SQL to calculate % completion
        try {
            $progress = Yii::$app->db->createCommand("
            SELECT COALESCE(SUM(r.percent_done) / COUNT(t.id), 0)
            FROM tom_task t
            LEFT JOIN tom_report r ON r.task_id = t.id
            WHERE t.project_id = :project_id
        ")->bindValue(':project_id', $this->id)
                ->queryScalar();

            return round($progress, 2); // Return rounded progress %
        } catch (Exception $e) {
            Yii::warning($e->getMessage());
            return 0; // Return a default value in case of exception
        }
    }
}