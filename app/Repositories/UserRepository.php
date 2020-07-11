<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\UserDetail;
use DB;
use App\EloquentRepository;
use App\User;
use Carbon\Carbon;


class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    protected $allowedAttributes = ['model'];

    public function __construct(User $model, UserDetail $detail)
    {
        $this->model = $model;
        $this->detail =$detail;
    }

    public function getAll()
    {
        return $this->model->where('role', $this->model::USER_ROLE_USER)->get();
    }

/**
    public function getBirthdays($date = false)
    {
        if (!$date) {
            $date = Carbon::now();
        } else {
            $date = Carbon::createFromFormat('Y-m-d', $date);
        }
        $items = $this->model
            ->where('role', $this->model::USER_ROLE_USER)
            ->whereRaw('MONTH(birth_date) = ?', [$date->month])
            ->get();

        $events = [];
        foreach ($items as $key => $value) {
            $birthday = Carbon::createFromFormat('Y-m-d', $value->birth_date);
            $events[]= [
                'title' => $value->first_name.' '.$value->last_name,
                'start' => Carbon::createFromDate(null, $birthday->month, $birthday->day)->format('Y-m-d')
            ];
        }

        return $events;
    }

    public function pluckName()
    {
        return $this->model->select(DB::raw('CONCAT(first_name, " ", last_name) as name, id'))
            ->where('role', $this->model::USER_ROLE_USER)
            ->pluck('name', 'id');
    }

    public function getSelect2Data($filter = '', $offset = 0, $limit = 10)
    {
        $qry = DB::table('users')
            ->select('id', 'first_name', 'last_name', 'email');
        if ($filter) {
            $qry->whereRaw('CONCAT(first_name, " ", last_name) like ?', [$filter.'%'])
                ->orWhere('first_name', 'like', $filter.'%')
                ->orWhere('last_name', 'like', $filter.'%');
        }
        $total = $qry->count();
        $items = $qry->skip($offset)->take($limit)->get();
        return ['incomplete_results' => false, 'total_count' => $total, 'items' => $items];
    }

    public function getSelect2Selection($id)
    {
        $items = $this->model->find($id);
        return ['incomplete_results' => false, 'total_count' => 1, 'items' => $items];
    }*/
}
