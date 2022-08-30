<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Record Entity
 *
 * @property int $id
 * @property string $title
 * @property string $artist
 * @property string $year
 * @property int $genre_id
 * @property int|null $no_of_discs
 *
 * @property \App\Model\Entity\Genre $genre
 */
class Record extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'artist' => true,
        'year' => true,
        'genre_id' => true,
        'no_of_discs' => true,
        'genre' => true,
    ];
}
