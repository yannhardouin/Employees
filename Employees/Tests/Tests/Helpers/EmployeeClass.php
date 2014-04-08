<?php
namespace Employees\Tests\Tests\Helpers;
use Entities\Domain\Entities\Builders\Factories\EntityBuilderFactory;
use Uuids\Domain\Uuids\Uuid;
use Strings\Domain\Strings\String;
use DateTimes\Domain\DateTimes\DateTime;
use Integers\Domain\Integers\Integer;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeClass
 *
 * @author stagiaire
 */
class EmployeeClass {
    //put your code here
    private $entityBuilderFactory;
    private $uuid;
    private $lastName;
    private $firstName;
    private $number;
    private $createdOn;
    private $lastUpdatedOn;
    
    
    public function __construct(EntityBuilderFactory $e, Uuid $u, String $lN,String $fN, Integer $number,DateTime $cOn,DateTime $lUOn)
    {
        
        $this->createdOn = $cOn;
        $this->entityBuilderFactory = $e;
        $this->firstName = $fN;
        $this->lastName = $lN;
        $this->number = $number;
        $this->lastUpdatedOn = $lUOn;
        $this->uuid = $u;
    }

    public function build()
    {
        return $this->entityBuilderFactory->create()
                                            ->create()
                                            ->withUuid($this->uuid)
                                            ->withFirstName($this->firstName)
                                            ->withLastName($this->lastName)
                                            ->withNumber($this->number)
                                            ->createdOn($this->createdOn)
                                            ->now();
                
    }
    
    public function build_lastUpdatedOn() {
        return $this->entityBuilderFactory->create()
                                            ->create()
                                            ->withUuid($this->uuid)
                                            ->withFirstName($this->firstName)
                                            ->withLastName($this->lastName)
                                            ->withNumber($this->number)
                                            ->createdOn($this->createdOn)
                                            ->lastUpdatedOn($this->lastUpdatedOn)
                                            ->now();
    }
        
}