<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Categoria]].
 *
 * @see \common\models\Categoria
 */
class CategoriaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Categoria[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Categoria|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
