<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PHPNativeElementsTest
 *
 * @author isaac
 */
use PHPUnit_Framework_TestCase as PHPUnit;
use View\Helper\HelperLivros;
class PHPNativeElementsTest  extends PHPUnit {
    //put your code here
    public function setUp() {
       
    }
    public function testInst(){
     (new HelperLivros())->tabela();
     (new HelperLivros())->chuvaTags();
     (new HelperLivros())->select();
    
    
    }    

    public function tearDown() {
        
    }
}
