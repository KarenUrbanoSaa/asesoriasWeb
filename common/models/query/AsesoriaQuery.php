<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Asesoria]].
 *
 * @see \common\models\Asesoria
 */
class AsesoriaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Asesoria[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Asesoria|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
