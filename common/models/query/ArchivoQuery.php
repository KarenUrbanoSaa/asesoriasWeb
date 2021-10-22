<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Archivo]].
 *
 * @see \common\models\Archivo
 */
class ArchivoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Archivo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Archivo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
