<?php

namespace App\Services;

use App\Helpers\Str;
use App\Models\Broker;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BrokerService
{
    protected ?Broker $broker;

    public function __construct(?Broker $broker = null)
    {
        $this->broker = $broker;
    }

    public function create(array $data): void
    {
        DB::transaction(function () use ($data){
            $name_slug = Str::nameSlug([$data['name']], Broker::class);

            $this->broker = new Broker();
            $this->broker->fill(array_merge($data, ['name_slug'=>$name_slug]));
            $this->broker->save();

            User::create([
                'name' => $this->broker->name,
                'email' => (array_key_exists('email', $data) && $data['email']) ? $data['email'] : '',
                'password' => (array_key_exists('password', $data) && $data['password'])? Hash::make($data['password']) : '',
                'entity_type'=>'BROKER',
                'entity_id'=>$this->broker->id,
            ]);
        });
    }

    public function update(array $data): Broker
    {
        $this->broker->fill($data);
        $this->broker->save();

        return $this->broker;
    }

    public function delete(): void
    {
        $this->broker->delete();
    }


}
