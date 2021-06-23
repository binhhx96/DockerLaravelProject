<?php

namespace App\Entities\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Models\BaseModel
 *
 * @mixin Builder|Model
 */
abstract class AbstractModel extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Before save covert to timezone default
     *
     * @var array
     */
    public $datetimeConvert = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get primary key
     *
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * Get the format for database stored dates.
     *
     * @return string
     */
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u0';
    }

    public function getUpdatedAt()
    {
        return '2000-11-11 22:22:22.6749670';
    }
}
