<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $question
 * @property int $answer_type
 * @property string|null $answer_A
 * @property string|null $answer_B
 * @property string|null $answer_C
 * @property string|null $answer_D
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Question extends Entity
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
        'question' => true,
        'answer_type' => true,
        'answer_A' => true,
        'answer_B' => true,
        'answer_C' => true,
        'answer_D' => true,
        'created' => true,
        'modified' => true
    ];
}
