<?php

declare(strict_types=1);

namespace Modules\Theme\Traits;

/*
 * https://github.com/kdion4891/laravel-livewire-tables/blob/master/src/Traits/ThanksYajra.php
 */

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

/**
 * Trait ThanksYajra.
 */
<<<<<<< HEAD
trait ThanksYajra {
=======
trait ThanksYajra
{
>>>>>>> ede0df7 (first)
    /**
     * @param string $attribute
     *
     * @return object
     */
<<<<<<< HEAD
    public function relationship($attribute) {
=======
    public function relationship($attribute)
    {
>>>>>>> ede0df7 (first)
        $parts = explode('.', $attribute);

        return (object) [
            'attribute' => array_pop($parts),
            'name' => implode('.', $parts),
        ];
    }

    /**
     * @param string $relationships
     * @param string $attribute
     *
     * @return string
     */
<<<<<<< HEAD
    public function attribute(Builder $query, $relationships, $attribute) {
=======
    public function attribute(Builder $query, $relationships, $attribute)
    {
>>>>>>> ede0df7 (first)
        $table = '';
        $last_query = $query;

        foreach (explode('.', $relationships) as $each_relationship) {
            $model = $last_query->getRelation($each_relationship);

            switch (true) {
<<<<<<< HEAD
                case $model instanceof BelongsToMany:
                    $pivot = $model->getTable();
                    $pivotPK = $model->getExistenceCompareKey();
                    $pivotFK = $model->getQualifiedParentKeyName();
                    $query->leftJoin($pivot, $pivotPK, $pivotFK);

                    $related = $model->getRelated();
                    $table = $related->getTable();
                    $tablePK = $related->getForeignKey();
                    $foreign = $pivot.'.'.$tablePK;
                    $other = $related->getQualifiedKeyName();

                    $last_query->addSelect($table.'.'.$attribute);
                    $query->leftJoin($table, $foreign, $other);

                    break;

                case $model instanceof HasOneOrMany:
                    $table = $model->getRelated()->getTable();
                    $foreign = $model->getQualifiedForeignKeyName();
                    $other = $model->getQualifiedParentKeyName();
                    break;

                case $model instanceof BelongsTo:
                    $table = $model->getRelated()->getTable();
                    $foreign = $model->getQualifiedForeignKeyName();
                    $other = $model->getQualifiedOwnerKeyName();
                    break;

                default:
                    return $attribute;
=======
            case $model instanceof BelongsToMany:
                $pivot = $model->getTable();
                $pivotPK = $model->getExistenceCompareKey();
                $pivotFK = $model->getQualifiedParentKeyName();
                $query->leftJoin($pivot, $pivotPK, $pivotFK);

                $related = $model->getRelated();
                $table = $related->getTable();
                $tablePK = $related->getForeignKey();
                $foreign = $pivot.'.'.$tablePK;
                $other = $related->getQualifiedKeyName();

                $last_query->addSelect($table.'.'.$attribute);
                $query->leftJoin($table, $foreign, $other);

                break;

            case $model instanceof HasOneOrMany:
                $table = $model->getRelated()->getTable();
                $foreign = $model->getQualifiedForeignKeyName();
                $other = $model->getQualifiedParentKeyName();
                break;

            case $model instanceof BelongsTo:
                $table = $model->getRelated()->getTable();
                $foreign = $model->getQualifiedForeignKeyName();
                $other = $model->getQualifiedOwnerKeyName();
                break;

            default:
                return $attribute;
>>>>>>> ede0df7 (first)
            }

            $query->leftJoin($table, $foreign, $other);
            $last_query = $model->getQuery();
        }

        return $table.'.'.$attribute;
    }
}
