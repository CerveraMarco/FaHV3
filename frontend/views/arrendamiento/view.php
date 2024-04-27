<?php
use yii\bootstrap5\Carousel;
use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var common\models\Arrendamiento $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arrendamientos'), 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="arrendamiento-view">


    <p>
        <!--Verifica si es el mismo usuario el que esta navegando en la aplicacion-->
        <?php if ($model->user_id != Yii::$app->user->id): 

                echo Html::tag('span', '', ['class' => ' disabled', 'disabled' => true]);

        ?>
                
        <?php else: ?>

                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php endif; ?>

        <?php if ($model->user_id != Yii::$app->user->id): 

                echo Html::tag('span', '', ['class' => ' disabled', 'disabled' => true]);

        ?>
                
        <?php else: ?>

                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>

        <?php endif; ?>

        
    </p>
    <div class="card no-border">
        <div class="card-header dashed-border-bottom">
            <h3>Detalles de la propiedad</h3>
        </div>
        <div class="card-body">
            <div class="row">

            <div class="col-md-6">
                <?php
            echo Carousel::widget([
                'items' => $model->carouselImages(),
                'options' => ['class' => 'project-view__carousel'],
            ]);
            ?>
            </div>

            <div class="col-md-6">
                <div class="row mb-3 row-view">
                    <h5 class="card-title"><?= Yii::t('app', 'Titulo') ?></h5>
                    <span class="detalle_propiedad"><?= $model->titulo?></span>
                </div>
                <div class="row mb-3">
                    <h5 class="card-title"><?= Yii::t('app', 'Descripcion') ?></h5>
                    <span class="detalle_propiedad"><?= $model->descripcion?></span>
                </div>
                <div class="row mb-3">
                    <h5 class="card-title"><?= Yii::t('app', 'Precio') ?></h5>
                    <span class="detalle_propiedad">$<?= $model->precio?></span>
                </div>
                <div class="row">
                    <h5 class="card-title"><?= Yii::t('app', 'Servicios') ?></h5>
                    <span class="detalle_propiedad"><?= implode(', ', $model->getServiciosSeleccionados());?></span>
                </div>

            </div>
            </div>
        </div>
    </div>
    


</div>
