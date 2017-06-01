<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;
use yii\data\Pagination;
use yii\widgets\LinkPager;

use jcabanillas\newsletter\common\entities\Client;
use jcabanillas\newsletter\backend\Newsletter;

/**
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * @var \yii\web\View $this
 * @var Client[] $clients
 * @var Pagination $pages
 */

BootstrapAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <h1>
            <?= 'Lista de clientes suscritos' ?>
            <?= Html::a('Descargar CSV', Url::toRoute('download-csv'), [
                    'class' => 'btn btn-sm btn-success pull-right'
                ]) ?>
        </h1>
    </div>
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th># (id)</th>
                    <th>
                        <?= 'E-mail' ?>
                    </th>
                    <th>
                        <?= 'Teléfono' ?>
                    </th>
                    <th>
                        <?= 'Fecha de Suscripción' ?>
                    </th>
                    <th>
                        <?= 'Borrar' ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clients as $client): ?>
                    <tr>
                        <td>
                            <?= $client->id ?>
                        </td>
                        <td>
                            <?= (!empty($client->email)) ? $client->email : '-' ?>
                        </td>
                        <td>
                            <?= (!empty($client->phone)) ? $client->phone : '-' ?>
                        </td>
                        <td>
                            <?= Yii::$app->formatter->asDatetime($client->created_at) ?>
                        </td>
                        <td>
                            <?php
                            $icon = Html::tag('span', '', ['class' => 'glyphicon glyphicon-remove']);
                            $url = Url::toRoute(['delete', 'id' => $client->id]);
                            echo Html::a($icon, $url, ['class' => 'text-danger']);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <?= LinkPager::widget([
                'pagination' => $pages
            ]) ?>
        </div>
    </div>
</div>
