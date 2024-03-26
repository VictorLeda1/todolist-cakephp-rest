<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TodoFixture
 */
class TodoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'todo';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-03-16',
                'finished' => '2024-03-16',
            ],
        ];
        parent::init();
    }
}
