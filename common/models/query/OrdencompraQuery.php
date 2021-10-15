<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Ordencompra]].
 *
 * @see \common\models\Ordencompra
 */
class OrdencompraQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Ordencompra[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Ordencompra|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
