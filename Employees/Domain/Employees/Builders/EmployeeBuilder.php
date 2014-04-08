<?php
namespace Employees\Domain\Employees\Builders;
use Entities\Domain\Entities\Builders\EntityBuilder;
use Strings\Domain\Strings\String;
use Integers\Domain\Integers\Integer;

interface EmployeeBuilder extends EntityBuilder {
    public function withFirstName(String $firstName);
    public function withLastName(String $lastName);
    public function withNumber(Integer $id);
}