<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Suburb Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $configuration_id
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\SuburbConfiguration $suburb_configuration
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Amenity[] $amenities
 * @property \App\Model\Entity\File[] $files
 * @property \App\Model\Entity\Handylink[] $handylinks
 * @property \App\Model\Entity\News[] $news
 * @property \App\Model\Entity\PaymentsNotificationsQueue[] $payments_notifications_queue
 * @property \App\Model\Entity\Phonebook[] $phonebook
 * @property \App\Model\Entity\Request[] $requests
 * @property \App\Model\Entity\Street[] $streets
 * @property \App\Model\Entity\Survey[] $surveys
 */
class Suburb extends Entity
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
        'name' => true,
        'description' => true,
        'configuration_id' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'suburb_configuration' => true,
        'status' => true,
        'amenities' => true,
        'files' => true,
        'handylinks' => true,
        'news' => true,
        'payments_notifications_queue' => true,
        'phonebook' => true,
        'requests' => true,
        'streets' => true,
        'surveys' => true
    ];
}
