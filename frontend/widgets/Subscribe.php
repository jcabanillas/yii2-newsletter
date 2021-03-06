<?php
namespace jcabanillas\newsletter\frontend\widgets;

use yii\base\Widget;

use jcabanillas\newsletter\frontend\Newsletter;
use jcabanillas\newsletter\common\entities\Client;

/**
 * Widget for rendering of form for subscribe
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @property string $moduleId
 * @property integer $subscribeType
 */
class Subscribe extends Widget
{
    // constants for select type of form for subscribe
    const SUBSCRIBE_TYPE_DEFAULT = 0;
    const SUBSCRIBE_TYPE_EMAIL = 1;
    const SUBSCRIBE_TYPE_PHONE = 2;

    /**
     * @var string Id of frontend `Newsletter` module
     * @see Newsletter
     */
    public $moduleId = 'newsletter';

    /**
     * @var integer Type of form for subscribe
     */
    public $subscribeType = self::SUBSCRIBE_TYPE_EMAIL;

    /**
     * @inheritdoc
     */
    public function run()
    {
        // TODO: add `subscribe-form` and `phone-subscribe-form`
        $view_name = 'subscribe-form-email';
        $action_route = '/' . $this->moduleId;

        switch ($this->subscribeType) {
            case self::SUBSCRIBE_TYPE_EMAIL:
                $view_name = 'subscribe-form-email';
                $action_route .= '/default/subscribe-email';
                break;
            case self::SUBSCRIBE_TYPE_PHONE:
                $view_name = 'subscribe-form-phone';
                break;
            default:
                $view_name = 'subscribe-form';
        }

        return $this->render($view_name, [
            'model' => new Client(),
            'action_route' => $action_route
        ]);
    }
}
