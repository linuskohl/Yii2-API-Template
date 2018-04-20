<?php
namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;

/**
 * Site controller
 */
class StatusController extends Controller
{

    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['get'],
                        'allow' => true,
                    ],
                ],
            ];
        $behaviors['verbs'] = [
                'class' => VerbFilter::class,
                'actions' => [
                    'get' => ['get'],
                ],
            ];

        /*$behaviors['rateLimiter'] = [
            'class' => \ethercreative\ratelimiter\IpRateLimiter::class,
            'rateLimit' => 1,
            'timePeriod' => 60,
            // Separate rate limiting for guests and authenticated users
            // Defaults to true
            // - false: use one set of rates, whether you are authenticated or not
            // - true: use separate ratesfor guests and authenticated users
            'separateRates' => false,
            'enableRateLimitHeaders' => true,
        ];*/
        return $behaviors;

    }


    /**
     * Displays status
     *
     * @return string
     */
    public function actionGet()
    {
        return ["status" => "ok",
                "time" => Yii::$app->formatter->format(time(), 'datetime')
        ];
    }


}
