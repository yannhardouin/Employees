<?php

namespace Employees\Tests\Helpers;
use Employees\Domain\Employees\Builders\EmployeeBuilder;
use Entities\Domain\Entities\Builders\Factories\EntityBuilderFactory;
use Entities\Tests\Helpers\EntityBuilderFactoryHelper;
use Employees\Domain\Employees\Employee;
use Strings\Domain\Strings\String;
use DateTimes\Domain\DateTimes\DateTime;
use Uuids\Domain\Uuids\Uuid;
use UnitTestHelpers\Tests\Helpers\AbstractHelper;
use Integers\Domain\Integers\Integer;

final class EmployeeBuilderFactoryHelper extends AbstractHelper {
    private $employeeBuilderMock;
    private $entityBuilderFactoryMock;
    private $entityBuilderFactoryHelper;
    
    public function __construct(\PHPUnit_Framework_TestCase $phpunit, EmployeeBuilder $employeeBuilderMock, EntityBuilderFactory $entityBuilderFactoryMock) {
        parent::__construct($phpunit);
        $this->employeeBuilderMock = $employeeBuilderMock;
        $this->entityBuilderFactoryMock = $entityBuilderFactoryMock;
        $this->entityBuilderFactoryHelper = new EntityBuilderFactoryHelper($phpunit, $employeeBuilderMock, $entityBuilderFactoryMock);
    }
    
    public function expectsEmployeeBuilderFactory_Success(Employee $returnedEmployee, Uuid $uuid,String $firstName,String $lastName,Integer $number,DateTime $createdOn)
    {
        $this->entityBuilderFactoryHelper->expectsEntityBuilderFactory_Success($returnedEmployee,$uuid,$createdOn);
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withFirstName')
                                            ->with($firstName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withLastName')
                                            ->with($lastName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withNumber')
                                            ->with($number)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    }  
    
    public function expectsEmployeeBuilderFactory_lastUpdatedOn_Success(Employee $returnedEmployee, Uuid $uuid,String $firstName,String $lastName,Integer $number,DateTime $createdOn,DateTime $lastUpdatedOn)
    {
        $this->entityBuilderFactoryHelper->expectsEntityBuilderFactory_lastUpdatedOn_Success($returnedEmployee,$uuid,$createdOn,$lastUpdatedOn);
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withFirstName')
                                            ->with($firstName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withLastName')
                                            ->with($lastName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withNumber')
                                            ->with($number)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    }
    
    public function expectsEmployeeBuilderFactory_throwsCannotBuildEntityException(Uuid $uuid, String $firstName, String $lastName, Integer $number, DateTime $createdOn)
    {
        $this->entityBuilderFactoryHelper->expectsEntityBuilderFactory_throwsCannotBuildEntityException($uuid, $createdOn);
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withFirstName')
                                            ->with($firstName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withLastName')
                                            ->with($lastName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withNumber')
                                            ->with($number)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    }
    
    public function expectsEmployeeBuilderFactory_lastUpdatedOn_throwsCannotBuildEntityException(Uuid $uuid, String $firstName,String $lastName,Integer $number,DateTime $createdOn,DateTime $lastUpdatedOn)
    {
        $this->entityBuilderFactoryHelper->expectsEntityBuilderFactory_lastUpdatedOn_throwsCannotBuildEntityException($uuid, $createdOn, $lastUpdatedOn);
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withFirstName')
                                            ->with($firstName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withLastName')
                                            ->with($lastName)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
        
        $this->employeeBuilderMock->expects($this->phpunit->once())
                                            ->method('withNumber')
                                            ->with($number)
                                            ->will($this->phpunit->returnValue($this->employeeBuilderMock));
    }
}
