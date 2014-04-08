<?php
namespace Employees\Tests\Tests\Unit;

use Employees\Tests\Tests\Helpers\EmployeeClass;
use Employees\Tests\Helpers\EmployeeHelper;
use Employees\Tests\Helpers\EmployeeBuilderFactoryHelper;

use Entities\Domain\Entities\Builders\Exceptions\CannotBuildEntityException;
use Entities\Domain\Entities\Exceptions\CannotRequestHasBeenUpdatedException;

final class EmployeeTest extends \PHPUnit_Framework_TestCase {
    
    private $entityBuilderFactoryMock;
    private $employeeBuilderMock;
    private $employeeMock;
    private $uuidMock;
    private $stringMock;
    private $intMock;
    private $dateTimeMock;
    private $class;
    private $employeeBuilderFactoryHelper;
    private $employeeHelper;
    
    
    public function setUp() {
        
        $this->entityBuilderFactoryMock = $this->getMock('Entities\Domain\Entities\Builders\Factories\EntityBuilderFactory');
        $this->employeeBuilderMock = $this->getMock('Employees\Domain\Employees\Builders\EmployeeBuilder');
        $this->employeeMock = $this->getMock('Employees\Domain\Employees\Employee');
        
        $this->intMock = $this->getMock('Integers\Domain\Integers\Integer');
        $this->uuidMock = $this->getMock('Uuids\Domain\Uuids\Uuid');
        $this->stringMock = $this->getMock('Strings\Domain\Strings\String');
        $this->dateTimeMock = $this->getMock('DateTimes\Domain\DateTimes\DateTime');
        
        $this->class = new EmployeeClass($this->entityBuilderFactoryMock, $this->uuidMock, $this->stringMock, $this->stringMock,  $this->intMock, $this->dateTimeMock, $this->dateTimeMock);
        
        
        $this->employeeBuilderFactoryHelper = new EmployeeBuilderFactoryHelper($this, $this->employeeBuilderMock, $this->entityBuilderFactoryMock);
        $this->employeeHelper = new EmployeeHelper($this, $this->employeeMock);
        
    }
    
    public function tearDown() {
        
    }
    
    public function testBuild_Success() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_Success($this->employeeMock, $this->uuidMock, $this->stringMock, $this->stringMock, $this->intMock, $this->dateTimeMock);
        
        $employee = $this->class->build();
        
        $this->assertEquals($this->employeeMock, $employee);
        
    }
     
    public function testBuild_throwsCannotBuildEntityException() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_throwsCannotBuildEntityException($this->uuidMock, $this->stringMock, $this->stringMock, $this->intMock, $this->dateTimeMock);
        
        $asserted = false;
        try {
        
            $this->class->build();
            
        } catch (CannotBuildEntityException $exception) {
            $asserted = true;
        }
        
        $this->assertTrue($asserted);
        
    }
    
    public function testBuild_lastUpdatedOn_Success() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_lastUpdatedOn_Success($this->employeeMock,$this->uuidMock, $this->stringMock, $this->stringMock, $this->intMock, $this->dateTimeMock, $this->dateTimeMock);
        
        $employee = $this->class->build_lastUpdatedOn();
        
        $this->assertEquals($this->employeeMock, $employee);
        
    }
    
    public function testBuild_lastUpdatedOn_throwsCannotBuildEntityException() {
        
        $this->employeeBuilderFactoryHelper->expectsEmployeeBuilderFactory_lastUpdatedOn_throwsCannotBuildEntityException($this->uuidMock, $this->stringMock, $this->stringMock, $this->intMock, $this->dateTimeMock, $this->dateTimeMock);
        
        $asserted = false;
        try {
        
            $this->class->build_lastUpdatedOn();
            
        } catch (CannotBuildEntityException $exception) {
            $asserted = true;
        }
        
        $this->assertTrue($asserted);
        
    }
    
    public function testGetFirstName_Success() {
        
        $this->employeeHelper->expectsGetFirstName_Success($this->stringMock);
        
        $firstName = $this->employeeMock->getFirstName();
        
        $this->assertEquals($this->stringMock, $firstName);
        
    }
    
    public function testGetFirstName_multiple_Success() {
        
        $this->employeeHelper->expectsGetFirstName_multiple_Success(array($this->stringMock, $this->stringMock));
        
        $firstFirstName = $this->employeeMock->getFirstName();
        $secondFirstName = $this->employeeMock->getFirstName();
        
        $this->assertEquals($this->stringMock, $firstFirstName);
        $this->assertEquals($this->stringMock, $secondFirstName);
        
    }
    
    public function testGetLastName_Success() {
        
        $this->employeeHelper->expectsGetLastName_Success($this->stringMock);
        
        $LastName = $this->employeeMock->getLastName();
        
        $this->assertEquals($this->stringMock, $LastName);
        
    }
    
    public function testGetLastName_multiple_Success() {
        
        $this->employeeHelper->expectsGetLastName_multiple_Success(array($this->stringMock, $this->stringMock));
        
        $firstLastName = $this->employeeMock->getLastName();
        $secondLastName = $this->employeeMock->getLastName();
        
        $this->assertEquals($this->stringMock, $firstLastName);
        $this->assertEquals($this->stringMock, $secondLastName);
        
    }
    
    public function testGetNumber_Success() {
        
        $this->employeeHelper->expectsGetNumber_Success($this->intMock);
        
        $number = $this->employeeMock->getNumber();
        
        $this->assertEquals($this->intMock, $number);
        
    }
    
    public function testGetNumber_multiple_Success() {
        
        $this->employeeHelper->expectsGetNumber_multiple_Success(array($this->intMock, $this->intMock));
        
        $firstNumber = $this->employeeMock->getNumber();
        $secondNumber = $this->employeeMock->getNumber();
        
        $this->assertEquals($this->intMock, $firstNumber);
        $this->assertEquals($this->intMock, $secondNumber);
        
    }
    
    public function testExtendsRightInterfaces_Success() {
        
        $this->assertTrue($this->employeeMock instanceof \Entities\Domain\Entities\Entity);
        $this->assertTrue($this->employeeBuilderMock instanceof \Entities\Domain\Entities\Builders\EntityBuilder);
        
    }
    
}