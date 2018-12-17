<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $middle_name
 * @property string $last_name
 * @property string $second_last_name
 * @property int $status_id
 * @property int $registration_status_id
 * @property string $cell_phone
 * @property string $phone
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'name' => true,
        'middle_name' => true,
        'last_name' => true,
        'second_last_name' => true,
        'status_id' => true,
        'registration_status_id' => true,
        'cell_phone' => true,
        'phone' => true,
        'role' => true,
        'created' => true,
        'modified' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
