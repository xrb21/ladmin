<?php

namespace App\Repositories;

use App\User;

class UserRepository extends Repository {
  
  public function __construct(User $model) {
    parent::__construct($model);
  }

  public function datatables() {
    return Datatables::eloquest($this->model);
  }

  public function datatablesOptions() {
    return [
      'fields' => ['ID', 'Name', 'Email', 'Action'],
      'options' => [
        'processing' => true,
            'serverSide' => true,
            'ajax' => route('administrator.account.admin.index'),
            'columns' => [
                ['data' => 'id', 'class' => 'text-center'],
                ['data' => 'name'],
                ['data' => 'email'],
                ['data' => 'action', 'class' => 'text-center', 'orderable' => false]
            ]
      ]
    ];
  }

}