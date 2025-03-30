<?php
namespace app\controllers;
use yii\db\Exception;
use yii\web\Controller;
use app\models\Project;
use yii\web\NotFoundHttpException;

class ProjectController extends Controller
{
    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */

    public function actionIndex(): string
    {
        $projects = Project::find()->all(); // Fetch all projects from DB
        return $this->render('index', ['projects' => $projects]);
    }
    public function actionView($id): string
    {
        $project = Project::findOne($id);
        if (!$project) {
            throw new \yii\web\NotFoundHttpException("Project not found");
        }

        $progress = $project->getProgress(); // Get progress %

        return $this->render('project', [
            'project' => $project,
            'progress' => $progress
        ]);
    }
}
