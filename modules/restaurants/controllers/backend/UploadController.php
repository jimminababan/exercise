<?php

namespace app\modules\restaurants\controllers\backend;

use Yii;
use app\models\RestaurantOpeningHours;
use app\models\Restaurants;
use app\modules\restaurants\models\backend\UploadForm;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * RestaurantsController implements the CRUD actions for Restaurants model.
 */
class UploadController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Restaurants models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($fileName = $model->upload()) {

                if (($handle = fopen($fileName, 'r')) !== false) {
                    while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                        // $data[0] = Osakaya Restaurant
                        // $data[1] = Mon-Thu, Sun 11:30 am - 9 pm  / Fri-Sat 11:30 am - 9:30 pm

                        $restaurant = Restaurants::find()->where(['name' => $data[0]])->one() ?: new Restaurants;
                        $restaurant->name = $data[0];
                        $restaurant->save();
                        $openingHours = [];

                        $opening = explode('/', $data[1]);
                        $opening = array_map('trim', $opening);
                        $timeOpenArray = [];

                        foreach ($opening as $open) {
                            // $open = Fri-Sat 11:30 am - 9:30 pm

                            $dayOfWeekArray = explode(',', $open);
                            $dayOfWeekArray = array_map('trim', $dayOfWeekArray);
                            // dump($dayOfWeekArray);

                            foreach ($dayOfWeekArray as $dayOfWeek) {
                                // $dayOfWeek = Fri-Sat 11:30 am - 9:30 pm
                                $dayText = $dayOfWeek;

                                $pos = strpos($dayOfWeek, ' ');
                                if ($pos !== false) {
                                    $dayText = substr($dayOfWeek, 0, $pos);

                                    // $dayTimeOpenClosed = 11:30 am - 9:30 pm
                                    $dayTimeOpenClosed = substr($dayOfWeek, $pos, strlen($dayOfWeek));
                                    $dayTimeOpenClosed = explode('-', $dayTimeOpenClosed);
                                    $dayTimeOpenClosedArray = array_map('trim', $dayTimeOpenClosed);
                                    $openingHoursOpenClosed = [
                                        'time_open' => date('H:i', strtotime($dayTimeOpenClosedArray[0])),
                                        'time_closed' => date('H:i', strtotime($dayTimeOpenClosedArray[1])),
                                    ];
                                }

                                $dayOfWeekArray2 = $dayOfWeekArray3 = [];
                                // $dayArray = ['Fri', 'Sat']
                                if ($dayArray = explode('-', $dayText)) {
                                    foreach ($dayArray as $day) {
                                        $dayOfWeekArray2[] = date('w', strtotime($day));
                                        $dayOfWeekArray3[] = $day;
                                    }

                                    if (count($dayOfWeekArray2) >= 2) {
                                        for ($i = 0; $dayOfWeekArray2[1] != date('w', strtotime('+'.$i.' day', strtotime($dayOfWeekArray3[0]))); $i++) {
                                            $openingHours[] = [
                                                'day_of_week' => date('w', strtotime('+'.$i.' day', strtotime($dayOfWeekArray3[0]))),
                                            ]
                                            + $openingHoursOpenClosed;
                                        }
                                        $openingHours[] = [
                                            'day_of_week' => date('w', strtotime('+'.$i.' day', strtotime($dayOfWeekArray3[0]))),
                                        ]
                                        + $openingHoursOpenClosed;

                                    } else {
                                        foreach ($dayOfWeekArray2 as $day) {
                                            $openingHours[] = ['day_of_week' => (int) $day] + $openingHoursOpenClosed;
                                        }
                                    }
                                }
                            }
                        }

                        foreach ($restaurant->restaurantOpeningHours as $openingHour) {
                            $openingHour->delete();
                        }

                        foreach ($openingHours as $openingHour) {
                            $restaurantOpeningHour = new RestaurantOpeningHours;
                            $restaurantOpeningHour->attributes = $openingHour;
                            $restaurantOpeningHour->restaurant_id = $restaurant->id;
                            $restaurantOpeningHour->save();
                        }
                    }
                    fclose($handle);
                }

                return $this->redirect(['/restaurants/backend/restaurants']);
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}
