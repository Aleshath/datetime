<?php

namespace app\modules\account\controllers;

use app\models\Application;
use app\models\Status;
use Yii;

// ...

class AccountController
{

    // ...
    
    public function actionCreate()
    {
        $model = new Application();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->user_id = Yii::$app->user->id; // присваиваем айдишник
                $model->status_id = Status::getStatusId('Новая'); // присваиваем статус
                $model->datetime = $model->date.' '.$model->time; // соединяем дату и время для нашего столбца в БД

                if ($model->checkDateTime()) { // вызываем нашу функцию для проверки времени
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Заявка создана');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    // ...

}
