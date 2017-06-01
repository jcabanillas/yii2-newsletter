<?php
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\ActiveForm;

use jcabanillas\newsletter\common\entities\Client;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @var \yii\web\View $this
 * @var string $moduleId
 * @var Client $model
 * @var string $action_route
 */

BootstrapAsset::register($this);
?>

<?php
$form = ActiveForm::begin([
    'action' => [$action_route],
    'options' => ['class' => 'form-inline'],
    'enableClientValidation' => false
]);
?>
    <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail', 'class' => 'c-input form-control c-square c-theme'])->label(false) ?>
    <?= Html::submitButton('Suscribir', ['class' => 'btn c-theme-btn c-theme-border c-btn-square c-btn-uppercase c-font-16']) ?>
<?php $form->end() ?>
