<?php

namespace App;

enum EmployeeTypeEnum: int
{
    case FullTime = 1;
    case PartTime = 2;
    case Remote = 3;
    case Intern = 4;
    case Contractual = 5;
}
