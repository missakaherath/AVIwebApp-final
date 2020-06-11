<?php
require "PHP/manager.php";
class testAdminLogin extends TestCase{
    private $manager;
    protected function setUp(){
        $this->manager = new manager;
    }
    protected function tearDown(){
        $this->manager = null;
    }
    public function testLogin(){
        $response = $this->call('POST', )
    }
}