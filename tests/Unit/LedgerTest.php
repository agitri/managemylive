<?php

namespace Tests\Unit;

use App\Http\Controllers\LedgerController;
use Illuminate\Foundation\Auth\User;
use Illuminate\View\View;
use Mockery;
use Mockery\Mock;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversDefaultClass \App\Http\Controllers\LedgerController
 * @skipMockClassExistsTest
 */
class LedgerTest extends TestCase
{
    /**
     * @var LedgerController
     */
    protected $subject;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->subject = new LedgerController();
    }

    /**
     * @covers ::index
     * @covers ::getLedgerOrCreate
     *
     * @return void
     */
    public function testIndex()
    {
        // TODO
    }

    /**
     * @covers ::destroy
     *
     * @return void
     */
    public function testDestroy()
    {
        // TODO
    }
}
