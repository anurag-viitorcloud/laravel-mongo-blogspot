<?php

/**
 * Model-variables file contain all constant variables declaration of models which will be globally accessible.
 * Key of the table should be based on the table name (singular/plural)
 * Key of the Model class should be based on the class name (Always singular)
 */

use App\Models\Blog\Blog;
use App\Models\City\City;
use App\Models\Site\Site;
use App\Models\Test\Test;
use App\Models\User\User;
use App\Models\Order\Order;
use App\Models\State\State;
use App\Models\Country\Country;
use App\Models\Support\Support;
use App\Models\Witness\Witness;
use App\Models\Material\Material;
use Spatie\Permission\Models\Role;
use App\Models\OrderTest\OrderTest;
use App\Models\PromoCode\PromoCode;
use App\Models\Department\Department;
use App\Models\Information\Information;
use Spatie\Permission\Models\Permission;
use App\Models\MaterialType\MaterialType;
use App\Models\Notification\Notification;
use App\Models\OrderMaterial\OrderMaterial;


return [
    'models' => [
        /*
        * User Table and Model
        */
        'user' => [
            'table' => 'users',
            'class' => User::class,
        ],

        /*
        * Blog Table and Model
        */
        'blog' => [
            'table' => 'blogs',
            'class' => Blog::class,
        ],
    ],
];
