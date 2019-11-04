<?php

declare(strict_types = 1);

namespace WEO3;

use WEO3\Classes;
use PHPUnit\Framework\TestCase;

class FormProcessTest extends TestCase
{
    protected $class;

    public function setUp(): void
    {
        $_POST['name'] = "Good Name";
        $_POST['email'] = "somebody@oncetoldme.com";
        $_POST['phone'] = "312-773-0847";
        $_POST['message'] = "This one time, I saw a bear make a tackle.";
    }

    /**
     * @test
     */
    public function classFormProcessExists()
    {
        $this->class = FormProcess::getInstance();
        $this->assertInstanceOf(FormProcess::class, $this->class);
    }

    /**
     * @test
     */
    public function formHasRequiredName() {
        $this->assertStringContainsString('Good Name', $_POST['name']);
    }

    /**
     * @test
     */
    public function formHasRequiredEmail() {
        $this->assertStringContainsString('somebody@oncetoldme.com', $_POST['email']);
    }

    /**
     * @test
     */
    public function formHasRequiredMessage() {
        $this->assertStringContainsString('', $_POST['message']);
    }

}