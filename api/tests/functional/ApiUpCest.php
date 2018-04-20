<?php
namespace api\tests\FunctionalTester;

use Yii;
use api\tests\FunctionalTester;
/**
 * StatusController API functional test.
 *
 * @author Linus Kohl <linus@munichresearch.com>
 */
class ApiUpCest
{
    /**
     * @inheritdoc
     */
    public function _before(FunctionalTester $I)
    {
    }
    /* ===============================================================
     * `StatusController::actionGet()` test
     * ============================================================ */
    /**
     * @param FunctionalTester $I
     */
    public function apiUp(FunctionalTester $I)
    {
        $I->wantTo('Check if API is up');

        $I->sendGET('/v1/status');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}
